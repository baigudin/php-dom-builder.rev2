<?php
/** 
 * Singular element container.
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Core;

abstract class Element extends \DomBuilder\Element
{
  /**
   * Line feed character.
   */
  const LF = "\n";
  
  /**
   * Carriage return character.
   */
  const CR = "\r";
  
  /**
   * Tabulation string.
   */  
  const TB = "  ";
  
  /**
   * Single tag type.
   */    
  const TAG_SINGLE = 1;
  
  /**
   * Double block tag type.   
   */     
  const TAG_DOUBLE_BLOCK = 2;
  
  /**
   * Double block tag type.   
   */     
  const TAG_DOUBLE_INLINE = 3;

  /** 
   * Constructor.
   */
  function __construct()
  {
    $this->_length = 0;
    $this->_number = 0;
    $this->_prev = NULL;
    $this->_next = NULL;
    $this->_child = NULL;
    $this->_last = NULL;    
    $this->_parent = NULL;
    $this->_data = array(NULL);
    $this->_key = '';
    $this->_html = array('');
    $this->_attr = array();    
    $this->_tagId = self::$_countId++;    
    $this->_tagName = '';
    $this->_tagType = self::TAG_DOUBLE_BLOCK;
  } 

  /** 
   * Clone constructor.
   */
  function __clone()
  {
    $child = $this->_child;
    $this->_length = 0;
    $this->_number = 0;    
    $this->_prev = NULL;
    $this->_next = NULL;
    $this->_child = NULL;
    $this->_last = NULL;    
    $this->_parent = NULL;    
    $this->_tagId = self::$_countId++;        
    while($child != NULL)
    {
      $node = clone $child;
      $this->_insert($node);
      $child = $child->_next;
    }
  } 

  /** 
   * Destructor.   
   */
  function __destruct()
  {
  }   
  
  /** 
   * Inserts an element as the last child of this element.
   *
   * @param string|Element|ElementList $node a string that contains a tag name of new element or an element.
   * @return Element|false new inserted element.   
   */
  public function insert($node)
  {
    if( is_string($node) ) return $this->_insert(self::create($node));
    if( Element::isNode($node) ) return $this->_insert($node);
    if( Element::isList($node) ) 
    {
      $last = $this;      
      $list = $node->get();
      foreach($list as $n) $last = $this->_insert($n);    
      return $last;
    }
    self::_printError('Wrong argument type of insert() function');
    return false;
  }   
 
  /** 
   * Inserts an element as the first child of this element.   
   *
   * @param string|Element|ElementList $node a string that contains a tag name of new element or an element.
   * @return Element|false new inserted element.   
   */
  public function prepend($node)
  {
    if($this->_length == 0) return $this->insert($node);
    else return $this->_child->before($node);
  }
  
  /** 
   * Inserts an element after this element.
   *   
   * @param string|Element|ElementList $node a string that contains a tag name of new element or an element.
   * @return Element|false new inserted element.   
   */
  public function after($node)
  {
    if( is_string($node) ) return $this->_after(self::create($node));  
    if( Element::isNode($node) ) return $this->_after($node);
    if( Element::isList($node) ) 
    {
      $last = $this;
      $list = $node->get();
      foreach($list as $n) $last = $last->_after($n);    
      return $last;
    }
    self::_printError('Wrong argument type of after() function');
    return false;
  }
 
  /** 
   * Inserts an element before this element.
   *   
   * @param string|Element|ElementList $node a string that contains a tag name of new element or an element.
   * @return Element|ElementList|false new inserted element.   
   */
  public function before($node)
  {
    if( is_string($node) ) return $this->_before(self::create($node));    
    if( Element::isNode($node) ) return $this->_before($node);
    if( Element::isList($node) ) 
    {
      $last = $this;
      $list = $node->get();
      foreach($list as $n) $last = $last->_before($n);    
      return $last;
    }
    self::_printError('Wrong argument type of before() function');
    return false;
  }

  /** 
   * Removes this element.
   * 
   * @return Element removed elements.   
   */  
  public function remove()
  {
    $remove = $node = NULL;
    // Remove a child element
    if( Element::isNode($node) )
    {
      // Searching an element
      $remove = $this->_child;
      while($remove != NULL)
      {
        if($remove === $node) break;
        $remove = $remove->_next;
      }
      if($remove == NULL) 
      {
        self::_printError('Wrong argument type of remove() function: argument was not found in child list'); 
        return false;
      }    
    }
    else $remove = $this;
    return $remove->_remove();
  }
  
  /** 
   * Returns root elements of this element.
   * 
   * @return Element root element.   
   */
  public function root()
  {
    if($this->_parent == NULL) return $this;
    return $this->parent()->root();
  }   
  
  /**
   * Returns one.
   *
   * @return int always the one.
   */
  public function length()
  {
    return 1;
  }
  
  /**
   * Returns the previous element.
   *
   * @return Element|null previous element.
   */
  public function prev()
  {
    return $this->_prev;  
  }
  
  /**
   * Returns the next element.
   *
   * @return Element|null next element.
   */  
  public function next() 
  {
    return $this->_next;
  }
  
  /**
   * Returns a child element.
   *
   * @param int $number a sequence number of child element.
   * @return Element|null child element.   
   */
  public function child($number=0)
  {
    if( $number >= $this->_length ) return NULL;
    $node = $this->_child;
    while($number != 0)
    {
      if( $node == NULL ) break;
      $node = $node->_next;
      $number--;
    }
    return $node;    
  }
  
  /**
   * Returns the last child element.
   *
   * @return Element|null last child element.
   */   
  public function last()
  {
    return $this->_last;
  }
  
  /**
   * Returns the parent element.
   *
   * @return Element|null parent element.
   */  
  public function parent()
  {
    return $this->_parent;
  }

  /** 
   * Returns or sets a HTML content of this element.
   *
   * @param string $html new HTML string.
   * @param string $lang language key for given html string.   
   * @return string|Element a current value or this element.     
   */
  public function html($html=NULL, $lang=NULL)
  {
    // Set new value for self html string
    if( isset($html) ) return $this->_html($html, $lang);
    // If this element does not have a child element
    if( $this->_child == NULL ) return $this->_html();
    // Parse whole child elements
    $html = '';
    $node = $this->_child;
    while($node != NULL)
    {
      $html.= $node->_element();
      $node = $node->_next;
    }
    return $html;    
  }
  
  /** 
   * Returns or sets a text content of this element.
   *
   * @param string $text new text string.
   * @param string $lang language key for given html string.   
   * @return string|Element a current value or this element.      
   */
  public function text($text=NULL, $lang=NULL)
  {
    if( !isset($text) ) return htmlspecialchars($this->html(), ENT_QUOTES);
    return $this->html(htmlspecialchars($text, ENT_QUOTES), $lang);
  }   
  
  /**
   * Returns or sets any user data of this element.
   *
   * @param mixed  $data any data.
   * @param string $lang language key for given data.      
   * @return mixed|Element a data of the element or this element.     
   */     
  public function data($data=NULL, $lang=NULL)     
  {
    return $this->_langVariable($this->_data, $data, $lang);
  }

  /**
   * Returns or sets an associative string key.
   *
   * @param string $key a string key.
   * @return string|Element a key of the element or this element.   
   */     
  public function key($key=NULL)
  {
    if( !isset($key) ) return $this->_key;
    if( empty($key) ) return $this;
    $this->_key = $key;  
    return $this;
  }
  
  /**
   * Returns children of this element.
   *
   * @return Element|ElementList child elements of this element.   
   */
  public function children()
  {
    $list = self::newList();
    $node = $this->_child;
    while($node != NULL)
    {
      $list->push($node);
      $node = $node->_next;
    } 
    return self::_return($list);
  }    
  
  /**
   * Removes elements for matched elements by the query.
   *
   * @param string|Element|ElementList $query query string, Element object.
   * @return Element|ElementList parsed result.   
   */    
  public function not($query)
  {
    return self::newList()->push($this)->not($query);    
  }    

  /**
   * Filters elements by the query.
   *
   * @param string $query query string.
   * @return Element|ElementList filtered result.   
   */    
  public function filter($query)  
  {
    return self::newList()->push($this)->filter($query);    
  }
  
  /**
   * Searches parent elements by the query.
   *
   * @param string $query query string.
   * @return Element|ElementList searched result.   
   */  
  public function parents($query)
  {
    return self::newList()->push($this)->parents($query);
  }   
  
  /**
   * Searches child elements by the query.
   *
   * @param string $query query string.
   * @return Element|ElementList searched result.   
   */  
  public function find($query)
  {
    return self::newList()->push($this)->find($query);
  }
  
  /** 
   * Adds new class attribute value.
   *
   * @param string $value new class attribute value.
   * @return Element this element.   
   */  
  public function addClass($value)
  {
    $class = $this->attr('class');
    if( empty($class) ) return $this->attr('class', $value);
    $class = mb_split('[ ]{1,}', trim(mb_ereg_replace('[ ]{1,}', ' ', $class)));
    foreach($class as $cs) if($cs == $value) return $this;
    return $this->addAttr('class', $value);
  }  
  
  /** 
   * Removes class attribute value.
   *
   * @param string $value class attribute value.
   * @return Element this element.   
   */  
  public function removeClass($value)
  {
    if( !isset($value) ) return $this->removeAttr('class');
    $class = $this->attr('class');
    if( empty($class) ) return $this;
    $class = mb_split('[ ]{1,}', trim(mb_ereg_replace('[ ]{1,}', ' ', $class)));
    foreach($class as $k=>$cs) if($cs == $value) unset($class[$k]);
    $this->removeAttr('class');
    foreach($class as $cs) $this->addAttr('class', $cs);
    return $this;
  } 
   
  /**
   * Tests if this element has a given class name.
   *
   * @param string $name class name.
   * @return bool true if this element has given class name.   
   */     
  public function hasClass($name)
  {
    $class = $this->attr('class');
    if( empty($class) ) return false;
    $class = mb_split('[ ]{1,}', trim(mb_ereg_replace('[ ]{1,}', ' ', $class)));
    foreach($class as $cs) if($cs == $name) return true;
    return false;
  }   
  
  /** 
   * Returns an attribute value or sets attributes and its values.
   *
   * @param string|array $name  string with attribute name or array where 
   *                            key is attribute name and value is attribute value.
   * @param string       $value given attribute name value. 
   *                            If first argument is given as array type, 
   *                            this field is skipped.
   * @return string|Element a current attribute value or this element.        
   */  
  public function attr($name, $value=NULL)
  {
    if( is_array($name) )
      foreach($name as $n => $value) 
        $this->_attr( $n, $value );
    else if( is_string($name) )
    {
      if(!isset($value)) return $this->_getAttr($name);
      $this->_attr( $name, $value );
    }
    return $this;
  }

  /** 
   * Adds a new value to an attribute.
   *
   * @param string|array $name  string with attribute name or array where 
   *                            key is attribute name and value is attribute value.
   * @param string       $value given attribute name value. 
   *                            if first argument is given as array type, 
   *                            this field is be skipped.
   * @return Element this element.   
   */   
  public function addAttr($name, $value=NULL)
  {
    if( is_array($name) )
      foreach($name as $n => $value) 
        $this->_addAttr( $n, $value );
    else if( is_string($name) )
      $this->_addAttr( $name, $value );
    return $this;
  }
  
  /** 
   * Removes attribute of this element.
   *
   * @param string|array $name string with attribute name or array of attribute names. 
   * @return Element this element.   
   */  
  public function removeAttr($name)
  {
    if( is_array($name) )
      foreach($name as $n) 
        $this->_removeAttr( $n );
    else if( is_string($name) )
      $this->_removeAttr( $name );
    return $this;
  }
  
  /** 
   * Returns this element or this element as array.
   *
   * @param int|string $index element index of this elements or associative string key.   
   * @return Element|Element[]|false an element for integer or string argument, 
   *                                         or an elements array if argument is not given.   
   */ 
  public function get($index=NULL)
  {
    return self::newList()->push($this)->get($index); 
  }
  
  /**
   * Returns a HTML tag name of this element.
   *
   * @return string a tag name.   
   */
  public function tagName()
  {
    return $this->_tagName;
  }

  /**
   * Returns first child element with the specified ID.
   *
   * @param string $id ID value.
   * @return Element|false searched element.   
   */  
  public function getElementById($id)
  {
    return $this->getElementsById($id)->get(0);
  }  

  /**
   * Returns child elements with the specified ID of this element.
   *
   * @param string $id ID value.
   * @return Element|ElementList searched result.     
   */  
  public function getElementsById($id)
  {
    $list = self::newList();
    $node = $this->_child;
    while($node != NULL)
    {
      if( $node->_child != NULL ) $list->push( $node->getElementsById($id) );
      $idAttr = $node->attr('id');
      if( !empty($idAttr) && ($idAttr==$id) ) $list->push( $node );
      $node = $node->_next;
    }
    return self::_return($list);
  } 
  
  /**
   * Returns parent elements with the specified ID of this element.
   *
   * @param string $id ID value.
   * @return Element|ElementList searched result.   
   */  
  public function getParentsById($id)
  {
    $list = self::newList();
    $node = $this->_parent;
    while($node != NULL)
    {
      $idAttr = $node->attr('id');
      if( !empty($idAttr) && ($idAttr==$id) ) $list->push( $node );
      $node = $node->_parent;
    }
    return self::_return($list);
  }   

  /**
   * Returns child elements with the specified tag name of this element.
   *
   * @param string $name tag name.
   * @return Element|ElementList searched result.   
   */    
  public function getElementsByTagName($name)
  {
    $list = self::newList();
    $node = $this->_child;
    while($node != NULL)
    {
      if( $node->_child != NULL ) $list->push( $node->getElementsByTagName($name) );    
      if( $node->_tagName == $name ) $list->push( $node );
      $node = $node->_next;
    }
    return self::_return($list);
  }
  
  /**
   * Returns parent elements with the specified tag name of this element.
   *
   * @param string $name tag name.
   * @return Element|ElementList searched result.   
   */  
  public function getParentsByTagName($name)
  {
    $list = self::newList();
    $node = $this->_parent;
    while($node != NULL)
    {
      if( $node->_tagName == $name ) $list->push( $node );
      $node = $node->_parent;
    }
    return self::_return($list);
  }  
  
  /**
   * Returns child elements with the specified class name of this element.
   *
   * @param string $name class name.
   * @return Element|ElementList searched result.
   */  
  public function getElementsByClassName($name)
  {
    $list = self::newList();
    $node = $this->_child;
    while($node != NULL)
    {
      if( $node->_child != NULL ) $list->push( $node->getElementsByClassName($name) );    
      if( $node->hasClass($name) == true ) $list->push( $node );      
      $node = $node->_next;
    }
    return self::_return($list);
  } 
  
  /**
   * Returns parent elements with the specified class name of this element.
   *
   * @param string $name class name.
   * @return Element|ElementList searched result.   
   */  
  public function getParentsByClassName($name)
  {
    $list = self::newList();
    $node = $this->_parent;
    while($node != NULL)
    {
      if( $node->hasClass($name) == true ) $list->push( $node );            
      $node = $node->_parent;
    }
    return self::_return($list);
  } 

  /**
   * Returns child elements with the specified attribute name and its value of this element.
   *
   * @param string $name  attribute name.
   * @param string $value attribute value.
   * @return Element|ElementList searched result.   
   */  
  public function getElementsByAttr($name, $value=NULL)
  {
    $list = self::newList();
    $name = $this->_prepareAttr($name);    
    $node = $this->_child;
    while($node != NULL)
    {
      if( $node->_child != NULL ) $list->push( $node->getElementsByAttr($name, $value) );    
      foreach($node->_attr as $key=>$val)
      {
        if( !isset($value) && ($key==$name) )
        {
          $list->push( $node );      
          break;
        }
        else if( ($key==$name) && (strcasecmp($val, $value)==0) ) 
        {
          $list->push( $node );      
          break;
        }
      }
      $node = $node->_next;
    }
    return self::_return($list);
  }

  /**
   * Returns parent elements with the specified attribute name and its value of this element.
   *
   * @param string $name  attribute name.
   * @param string $value attribute value.
   * @return Element|ElementList searched result.   
   */  
  public function getParentsByAttr($name, $value=NULL)
  {
    $list = self::newList();
    $name = $this->_prepareAttr($name);        
    $node = $this->_parent;
    while($node != NULL)
    {
      foreach($node->_attr as $key=>$val)
      {
        if( !isset($value) && ($key==$name) )
        {
          $list->push( $node );      
          break;
        }
        else if( ($key==$name) && (strcasecmp($val, $value)==0) )           
        {
          $list->push( $node );      
          break;
        }
      }
      $node = $node->_parent;
    }
    return self::_return($list);    
  }   

  /**
   * Tests if this element has a given ID value.
   *
   * @param string $id ID value.
   * @return bool true if this element has given ID value.
   */  
  public function isElementsId($id)
  {
    return $this->attr('id') === $id ? true : false;
  }  
  
  /**
   * Tests if this element has a given tag name.
   *
   * @param string $name tag name.
   * @return bool true if this element has given tag name.      
   */  
  public function isElementsTagName($name)
  {
    return $this->_tagName === $name ? true : false;
  }
  
  /**
   * Tests if this element has a given class name.
   *
   * @param string $name class name.
   * @return bool true if this element has given class name.   
   */  
  public function isElementsClassName($name)
  {
    return $this->hasClass( $name );
  } 
  
  /**
   * Tests if this element has a given attribute name and its value.
   *
   * @param string $name  attribute name.
   * @param string $value attribute value.
   * @return bool true if this element matches given arguments.   
   */  
  public function isElementsAttr($name, $value=NULL)
  {
    $name = $this->_prepareAttr($name);    
    foreach($this->_attr as $key=>$val)
    {
      if( !isset($value) && ($key==$name) )
        return true;      
      else if( ($key==$name) && (strcasecmp($val, $value)==0) )         
        return true;
    }
    return false;
  }  
  
  /**
   * Tests if given object is this class or has this class as one of its parents.
   *
   * @param object $node tested object.
   * @return bool true if given object is this class or child class of this class.
   */  
  public static function isSelf($node)
  {
    return is_a($node, get_class());
  }

  /** 
   * Returns this HTML element with its HTML content.
   * 
   * @return string this element with child elements.
   */
  protected abstract function _element();
  
  /**
   * Returns or sets a HTML tag name of this element.
   *
   * @param string $tagName new HTML tag name.
   * @return Element a current value or this element.
   */
  protected function _tagName($tagName=NULL)
  {
    if( !isset($tagName) ) return $this->_tagName;
    $this->_tagName = $tagName;  
    return $this;
  }

  /**
   * Returns or sets a HTML tag type of this element.   
   *
   * @param int $tagType one of TAG_SINGLE, TAG_DOUBLE_BLOCK, or TAG_DOUBLE_INLINE constans.   
   * @return string|Element a current value or this element.      
   */
  protected function _tagType($tagType=NULL)
  {
    if( !isset($tagType) ) return $this->_tagType;
    switch($tagType)
    {
      case self::TAG_SINGLE:
      case self::TAG_DOUBLE_BLOCK: 
      case self::TAG_DOUBLE_INLINE: $this->_tagType = $tagType; break;
    }
    return $this;
  }
  
  /** 
   * Returns specified HTML attributes string of this element.
   * 
   * The method returns a specified HTML attributes string for start tag. 
   * The string starts with space character.
   *
   * @return string an attributes string for start tag.
   */     
  protected function _tagAttr()
  {
    if( empty($this->_attr) ) return '';
    $str = ' ';
    foreach($this->_attr as $name=>$value)
    {
      $str.= isset($value) ? $name.'="'.$value.'" ' : '';
    }
    return mb_substr($str, 0, mb_strlen($str)-1);
  }
  
  /** 
   * Sets an attribute value and returns an attributes array of this element.
   *
   * The method sets given value of given attribute and always returns the array of this element attributes. 
   * If new attribute has been set the method returns modified array. Note: attributes array does not clone
   * before returning and is returned by link. Be careful while you are working with it.
   *
   * @param string      $name  attribute name.
   * @param string|true $value attribute value or boolean true value for an auto-value of given name.
   * return array attributes array.
   */    
  protected function _attr($name=NULL, $value=true)  
  {
    if(!isset($name)) return $this->_attr;
    $name = $this->_prepareAttr($name);
    if($value === true) $value = $name.$this->_tagId;
    $this->_attr[$name] = $value;
    return $this->_attr;
  }    

  /** 
   * Returns line feed character if document is not compressed.
   *
   * @return string
   */   
  protected static function _lf()  
  {
    if( parent::docCompress() == true ) return '';
    return self::LF;
  }
  
  /** 
   * Returns or sets a language depending value of variable.
   * 
   * @param array  $array reference to depended array which should have an element of zero key as default value.
   * @param mixed  $value language value.
   * @param string $lang  language key for given value.         
   * @return mixed|Element a current value or this element.   
   */   
  protected function _langVariable(&$array, $value=NULL, $lang=NULL)
  {
    $ln = self::docLanguage();
    if( !isset($array[0]) ) $array[0] = NULL;
    // Getting set value        
    if( !isset($value) ) return isset($array[$ln]) ? $array[$ln] : $array[0];
    // Setting new value
    if( is_array($value) )
    {
      foreach($value as $l=>$v)
      {
        $array[$l] = $v;
        $array[0] = $v;        
      }
      return $this;
    }
    // Setting new value    
    if( isset($lang) && is_string($lang) ) $array[$lang] = $value;
    $array[0] = $value;
    return $this;
  }
  
  /** 
   * Returns prepared attribute name.
   *
   * @param string $name attribute name.   
   * @return string prepared attribute name.
   */   
  protected function _prepareAttr($name)
  {
    return isset($name) ? strtolower($name) : NULL;
  }
  
  /** 
   * Returns tabulated string.
   *
   * Method adds tabulation characters before every row of the string.
   * And adds a carriage return character to the end of the string.
   * 
   * @param string $str text string.
   * @return string tabulated given string.
   */      
  protected static function _tabulation($str)
  { 
    // Converting 0D0A to 0А
    $str = str_replace(self::CR.self::LF, self::LF, $str);
    // Adding LF to the end if last char does not LF
    if( substr($str, -1 ) != self::LF ) $str.= self::LF;
    // Replacing LF to LF.TB
    $str = self::TB . str_replace(self::LF, self::LF.self::TB, $str);
    // Deleting last TB
    return substr($str, 0, strlen($str)-strlen(self::TB));
  }  
  
  /** 
   * Returns or sets a HTML content of this element.
   *
   * @param string $html new HTML string.
   * @param string $lang language key for given html string.      
   * @return string|Element a current value or this element.   
   */  
  private function _html($html=NULL, $lang=NULL)  
  {
    return $this->_langVariable($this->_html, $html, $lang);
  }
  
  /** 
   * Adds attribute value.
   *
   * @param string $name  attribute name.
   * @param string $value attribute value.
   */   
  private function _addAttr($name, $value)  
  {
    $name = $this->_prepareAttr($name);    
    switch( $name )
    {
      case 'id':
      case 'name': 
      {
        self::_printError('Can not add an attribute to «'.$name.'» property');
        return;
      }
      break;
    }
    if( empty($value) ) return;    
    $value = isset($this->_attr[$name]) ? $this->_attr[$name].' '.$value : $value;
    return $this->_attr($name, $value);    
  }  

  /** 
   * Removes attribute.
   *
   * @param string $name attribute name.
   */    
  private function _removeAttr($name)  
  {
    $name = $this->_prepareAttr($name);
    if( isset($this->_attr[$name]) ) unset($this->_attr[$name]);
  }

  /** 
   * Returns attribute.
   *
   * @param string $name attribute name.   
   * @return string attribute value.
   */     
  private function _getAttr($name)  
  {
    $name = $this->_prepareAttr($name);
    if( !isset($this->_attr[$name]) ) return '';
    return $this->_attr[$name];
  }
  
  /** 
   * Inserts a child element to the end of this element child list.   
   *
   * @param Element $node inserting element.
   * @return Element inserted element.
   */  
  private function _insert($node)   
  {
    if( $node->_isLinked() ) $node = clone $node;  
    $node->_prev = NULL;
    $node->_next = NULL;
    if($this->_child == NULL)
    {
      $this->_child = $node;
      $this->_last = $node;      
    }
    else
    {   
      $this->_last->_next = $node;
      $node->_prev = $this->_last;      
      $this->_last = $node;          
    }
    $node->_parent = $this;
    $node->_number = $this->_length;
    $this->_length++;
    return $node;  
  }
  
  /** 
   * Inserts an element after this element.
   *   
   * @param Element $node inserting element.
   * @return Element inserted element.
   */  
  private function _after($node)
  {
    if( $node->_isLinked() ) $node = clone $node;
    $node->_prev = NULL;
    $node->_next = NULL;  
    $node->_parent = $this->_parent;
    $node->_next = $this->_next;
    $node->_prev = $this;
    $this->_next = $node;
    if($node->_next != NULL) $node->_next->_prev = $node;
    else $node->_parent->_last = $node;
    // Renumeration of sequence numbers
    $number = $this->_number;
    $next = $this->_next;
    while($next != NULL)
    {
      $next->_number = ++$number;      
      $next = $next->_next;
    }     
    $this->_parent->_length++;
    return $node;  
  }

  /** 
   * Inserts an element before this element.
   *   
   * @param Element $node inserting element.
   * @return Element inserted element.
   */  
  private function _before($node)  
  {
    if( $node->_isLinked() ) $node = clone $node;
    $node->_parent = $this->_parent;
    $node->_next = $this;
    $node->_prev = $this->_prev;
    $this->_prev = $node;
    if($node->_prev != NULL) $node->_prev->_next = $node;
    else $node->_parent->_child = $node;
    // Renumeration of sequence numbers
    $number = $this->_number;
    $next = $this->_prev;
    while($next != NULL)
    {
      $next->_number = $number++;      
      $next = $next->_next;
    }     
    $this->_parent->_length++;
    return $node;  
  }

  /** 
   * Removes this element.
   * 
   * @return Element this element.
   */  
  private function _remove()
  {
    // Sequence renumeration
    $next = $this->_next;
    while( $next != NULL )
    {
      $next->_number--;
      $next = $next->_next;
    }
    // Once element
    if($this->_prev == NULL && $this->_next == NULL)
    {
      if( $this->_parent != NULL )
      {
        $this->_parent->_child = NULL;
        $this->_parent->_last = NULL;    
      }
    }
    // Element is first    
    else if($this->_prev == NULL)
    {
      if( $this->_parent != NULL )
        $this->_parent->_child = $this->_next;
      $this->_next->_prev = NULL;        
    }
    // Element is last    
    else if($this->_next == NULL)
    {
      if( $this->_parent != NULL )
        $this->_parent->_last = $this->_prev;    
      $this->_prev->_next = NULL;
    }
    // Element is middle
    else
    {
      $this->_prev->_next = $this->_next;
      $this->_next->_prev = $this->_prev;
    }
    // Unlink from parent element
    if( $this->_parent != NULL )
    {
      $this->_parent->_length--;
      $this->_parent = NULL;
    } 
    // Unlink from next element
    if( $this->_next != NULL ) 
    {
      $this->_next = NULL;
    }     
    // Unlink from previous element
    if( $this->_prev != NULL ) 
    {
      $this->_prev = NULL;
    }     
    return $this;
  }
  
  /** 
   * Tests if element is linked to any neighbour.
   *
   * Method returns true if this element does not have parent element and sibling elements.
   *
   * @return bool
   */    
  private function _isLinked()
  {
    if($this->_parent != NULL) return true;
    if($this->_next != NULL) return true;
    if($this->_prev != NULL) return true;    
    return false;
  }  

  /** 
   * Prints a error string.
   *
   * @param string $str error string.
   */    
  private static function _printError($str)
  {
    $str = '<br /><b><span style="color: #bf2424">PHP Dom Builder</span> error:</b> %s<br />';
    if( parent::printError() ) echo sprintf( $str, '\''.get_called_class().'\' class error - '.$str);
  }
  
  /**
   * Count of child elements.
   * @var int
   */
  private $_length;
  
  /**
   * Sequence number of element as child.
   * @var int
   */
  private $_number; 
  
  /**
   * HTML markup or text string.
   * @var string[]
   */  
  private $_html;
  
  /**
   * HTML tag attributes.
   * @var array
   */   
  private $_attr;
  
  /**
   * HTML tag ID.
   * @var int
   */     
  private $_tagId;
  /**
   * HTML tag name.
   * @var string
   */     
  private $_tagName;
  
  /**
   * HTML tag out put type.   
   * @var int
   */     
  private $_tagType;
  
  /**
   * Previous element.
   * @var Element.
   */
  private $_prev;
  
  /**
   * Next element.
   * @var Element.
   */  
  private $_next;
  
  /**
   * First child element.
   * @var Element.   
   */  
  private $_child;
  /**
   * Last child element.
   * @var Element.
   */  
  private $_last;
  
  /**
   * Parent element.
   * @var Element. 
   */  
  private $_parent;
  
  /**
   * Any data
   * @var mixed[]
   */  
  private $_data;
  
  /**
   * Associative string key for elements list.
   * @var string
   */  
  private $_key;
  
  /**
   * Elements counter.
   * @var int
   */   
  private static $_countId = 0;
}