<?php
/** 
 * List of The Document Object Model (DOM) elements.
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */ 
namespace DomBuilder; 
 
class ElementList extends Element
{
  /**
   * For searching.
   */
  const FIND_VOID         = 0x00;
  const FIND_ID           = 0x01;
  const FIND_CLASS        = 0x02;
  const FIND_TAG          = 0x03;
  const FIND_ATTR         = 0x04;       
  const FIND_FILTER_ID    = 0x10;
  const FIND_FILTER_CLASS = 0x20;
  const FIND_FILTER_TAG   = 0x30;     
  const FIND_FILTER_ATTR  = 0x40; 
  
  /**
   * For searching by attributes.
   */  
  const FIND_ATTR_SELF = 0x1;
  const FIND_ATTR_EQ   = 0x2;

  /** 
   * Constructor.
   */
  function __construct()
  {
    $this->_length = 0;
    $this->_node = array();
    $this->_index = array();    
  }
  
  /** 
   * Destructor.   
   */
  function __destruct()
  {
  }
  
  /** 
   * Inserts an element as the last child of each element.
   *
   * @param string|ElementNode|ElementList $node a string type which containe a name of new tag.
   * @return ElementNode|ElementList new list of inserted elements.
   */
  public function insert($node)
  {
    $list = Element::newList();  
    foreach($this->_node as $n) $list->push( $n->insert($node) );
    return Element::_return($list);  
  }  
  
  /** 
   * Inserts an element as the first child of each element.   
   *
   * @param string|ElementNode|ElementList $node a string type which containe a name of new tag.
   * @return ElementNode|ElementList new list of inserted elements.
   */
  public function prepend($node)
  {
    $list = Element::newList();  
    foreach($this->_node as $n) $list->push( $n->prepend($node) );
    return Element::_return($list);
  }
  
  /** 
   * Inserts an element after each element.
   *   
   * @param string|ElementNode|ElementList $node a string type which containe a name of new tag.
   * @return ElementNode|ElementList new list of inserted elements.
   */   
  public function after($node)
  {
    $list = Element::newList();    
    foreach($this->_node as $n) $list->push( $n->after($node) );
    return Element::_return($list);
  }
  
  /** 
   * Inserts an element before each element.
   *   
   * @param string|ElementNode|ElementList $node a string type which containe a name of new tag.
   * @return ElementNode|ElementList new list of inserted elements.
   */ 
  public function before($node)
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->before($node) );
    return Element::_return($list);
  }

  /** 
   * Removes each element.
   * 
   * @return ElementNode|ElementList removed elements.
   */    
  public function remove()
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->remove() );
    return Element::_return($list);
  }   

  /** 
   * Returns root elements of each element.
   * 
   * @return ElementNode|ElementList root elements.   
   */   
  public function getRoot()
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->getRoot() );
    return Element::_return($list);
  }

  /**
   * Returns the number of elements of this list.
   *
   * @return int
   */
  public function length()
  {
    return $this->_length;
  } 
  
  /**
   * Returns previous elements.
   *
   * @return ElementNode|ElementList previous elements.
   */
  public function prev()
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->prev() );
    return Element::_return($list);
  }  
  
  /**
   * Returns next elements.
   *
   * @return ElementNode|ElementList next elements.
   */
  public function next()
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->next() );
    return Element::_return($list);
  }

  /**
   * Returns child elements.
   *
   * @param int $number a sequence number of child elements.
   * @return ElementNode|ElementList child elements.
   */
  public function child($number=0)
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->child($number) );
    return Element::_return($list);   
  } 
  
  /**
   * Returns last child elements.
   *
   * @return ElementNode|ElementList last child elements.
   */   
  public function last()
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->last() );
    return Element::_return($list);  
  }  
  
  /**
   * Returns parent elements.
   *
   * @return ElementNode|ElementList parent elements.
   */  
  public function parent()
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->parent() );
    return Element::_return($list); 
  }

  /** 
   * Returns or sets a HTML content of each element.
   *
   * Method returns content of the first element or 
   * sets given content for each element of this list.
   *
   * @param string $html new HTML string.
   * @param string $lang language key for given html string.      
   * @return string|ElementNode|ElementList content of the first element or this list.
   */   
   
  public function html($html=NULL, $lang=NULL)
  {
    if( !isset($html) ) return ($this->length() != 0) ? $this->_node[0]->html() : '';
    foreach($this->_node as $n) $n->html($html, $lang);
    return Element::_return($this);
  }
  
  /** 
   * Returns or sets a text content of this element.
   *
   * Method returns converted content of the first element or 
   * sets given content for each element of this list.
   *
   * @param string $text new text string.
   * @param string $lang language key for given html string.   
   * @return string|ElementNode|ElementList converted content of the first element or this list.
   */
  public function text($text=NULL, $lang=NULL)
  {
    if( !isset($text) ) return ($this->length() != 0) ? $this->_node[0]->text() : '';
    foreach($this->_node as $n) $n->text($text, $lang);
    return Element::_return($this);
  }     
  
  /**
   * Returns or sets any user data of each element.
   *
   * Method returns a user data of the first element or 
   * sets given data of each element of this list.
   *
   * @param mixed $data any data.
   * @param string $lang language key for given data.         
   * @return mixed|ElementNode|ElementList a data of the first element or this list.   
   */     
  public function data($data=NULL, $lang=NULL)
  {
    if( !isset($data) ) return ($this->length() != 0) ? $this->_node[0]->data() : '';
    foreach($this->_node as $n) $n->data($data, $lang);
    return Element::_return($this);
  }
  
  /** 
   * Returns or sets a string key.
   *
   * Method returns a key of the last element or
   * sets a key for last added element.
   *
   * @param string $key a string key.
   * @return string|ElementList a key of the last element or this list.
   */    
  public function key($key=NULL)
  {
    if( $this->_length == 0 ) return ( !isset($key) ) ? '' : $this;
    $i = $this->_length - 1;
    if( !isset($key) ) return $this->_node[$i]->key();
    $this->_index[$key] = $i;
    $this->_node[$i]->key($key);
    return $this;
  }
  
  /**
   * Returns a children of each element.
   *
   * @return ElementNode|ElementList children elements of each element.
   */
  public function children()
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->children() );
    return Element::_return($list);
  }    
  
  /**
   * Removes elements from this list for matched elements by the query.
   *
   * Method removes elements from this list by given query.
   * Requested child tags from query string are not processing.
   *
   * @param string|ElementNode|ElementList $query query string, ElementNode or ElementList object.
   * @return ElementNode|ElementList new list.
   */    
  public function not($query)
  {
    $list = Element::newList();
    $node = Element::newList();
    if( ElementNode::isSelf($query) ) 
      $node->push($query);
    else if( ElementList::isSelf($query) )
      $node = $query;
    else
      $node->push($this->filter($query));
    $list->push( $this->_not( $node ) );
    return Element::_return($list);
  }

  /**
   * Filters this list elements by the query.
   *
   * Method returns elements from this list which matching by the query.
   * Requested child tags from query string are not processing.
   *
   * @param string $query query string.
   * @return ElementNode|ElementList new list.
   */    
  public function filter($query)
  {
    $list = Element::newList();  
    // Query preparation
    $query = trim( mb_ereg_replace('[ ]{1,}', ' ', strtolower($query) ) );    
    // Select all querys
    $queryArray = mb_split('[ ]{0,1},[ ]{0,1}', $query);    
    // Remove child elements of query string
    $i = 0;
    foreach($queryArray as $query) 
    {
      $arr = mb_split('[ ]{1,}', $query);
      $queryArray[$i++] = $arr[0];
    }
    foreach($queryArray as $query) 
      $list->push( $this->_filter($query) );
    return Element::_return($list);
  }
  
  /**
   * Searches parent elements.
   *
   * @param string $query query string.
   * @return ElementNode|ElementList search result.
   */    
  public function parents($query)
  {
    $list = Element::newList();  
    // Query preparation
    $query = trim( mb_ereg_replace('[ ]{1,}', ' ', strtolower($query) ) );    
    // Select all querys
    $queryArray = mb_split('[ ]{0,1},[ ]{0,1}', $query);    
    foreach($queryArray as $query) 
      $list->push( $this->_parents(' '.$query) );
    return Element::_return($list);
  }
  
  /**
   * Searches child elements.
   *
   * @param string $query query string.
   * @return ElementNode|ElementList search result.
   */   
  public function find($query)
  {
    $list = Element::newList();  
    // Query preparation
    $query = trim( mb_ereg_replace('[ ]{1,}', ' ', strtolower($query) ) );    
    // Select all querys
    $queryArray = mb_split('[ ]{0,1},[ ]{0,1}', $query);    
    foreach($queryArray as $query) 
      $list->push( $this->_find(' '.$query) );
    return Element::_return($list);
  }
  
  /** 
   * Adds new class attribute value for this list elements.
   *
   * Sets new value for class attribute. 
   * If class attribute is set, the method adds new value of attribute.
   *
   * @param string $value new class attribute value.
   * @return ElementNode|ElementList this list.
   */     
  public function addClass($value)
  {
    foreach($this->_node as $n) $n->addClass($value);
    return Element::_return($this);
  }   

  /** 
   * Removes class attribute value for this list elements.
   *
   * @param string $value class attribute value.
   * @return ElementNode|ElementList this list.
   */     
  public function removeClass($value)
  {
    foreach($this->_node as $n) $n->removeClass($value);
    return Element::_return($this);
  } 
  
  /**
   * Tests if each element has a given class name.
   *
   * @param string $name class name.
   * @return bool true if element has given attribute value.
   */     
  public function hasClass($name)  
  {
    foreach($this->_node as $n) if( $n->hasClass($name) == false ) return false;
    return true;    
  }  
  
  /** 
   * Sets attributes and its values for each element.
   *
   * Sets new value for given attribute. 
   * If attribute is set, the method sets new given value of attribute.   
   *
   * @param string|array $name  string with attribute name or array where 
   *                            key is attribute name and value is attribute value.
   * @param string       $value given attribute name value. 
   *                             if first argument is given as array type, 
   *                             this field is skipped.
   * @return ElementNode|ElementList this list.
   */    
  public function attr($name, $value=NULL)
  {
    if( is_array($name) )
      foreach($name as $n => $value) 
        $this->_attr( $n, $value );
    else if( is_string($name) )
      $this->_attr( $name, $value );
    return Element::_return($this);
  }

  /** 
   * Adds new values to an attributes for each element.
   *
   * Sets new value for an attribute. 
   * If given attribute is set, the method adds new value of this attribute.
   *
   * @param string|array $name  string with attribute name or array where 
   *                            key is attribute name and value is attribute value.
   * @param string       $value given attribute name value. 
   *                            if first argument is given as array type, 
   *                            this field is be skipped.
   * @return ElementNode|ElementList this list.
   */     
  public function addAttr($name, $value=NULL)
  {
    if( is_array($name) )
      foreach($name as $n => $value) 
        $this->_addAttr( $n, $value );
    else if( is_string($name) )
      $this->_addAttr( $name, $value );
    return Element::_return($this);
  }

  /** 
   * Removes attributes for each element.
   *
   * @param string|array $name string with attribute name or array where 
   *                           key is attribute name and value is attribute value.
   * @return ElementNode|ElementList this list.
   */     
  public function removeAttr($name)
  {
    if( is_array($name) )
      foreach($name as $n) 
        $this->_removeAttr( $n );
    else if( is_string($name) )
      $this->_removeAttr( $name );
    return Element::_return($this);
  }
  
  /** 
   * Returns an element of this list or elements array.
   *
   * The method returns an elements array as vector if argument in not given.
   * If argument greater than or equal zero, method returns an element with given index.
   * If argument less than zero, method counts a index from the end of the list.
   * For example: [-1] returns the last element, [-2] returns the penultimate element, etc.
   *
   * @param int|string $index element index of this elements list or associative string key.   
   * @return ElementNode|ElementNode[]|false an element for integer or string argument, elements array if argument in not given.
   */   
  public function get($index=NULL)
  {
    if( !isset($index) ) return $this->_node;
    if( $this->length() == 0 )
    {
      self::_printError('Wrong argument type of get() function: list length is zero');      
      return false;    
    }
    if( is_numeric($index) )
    {
      $i = ( $index >= 0 ) ? $index : $this->length() + $index;
      if( !isset($this->_node[$i]) ) return false;
      return $this->_node[$i];
    }
    if( is_string($index) )
    {
      if( !isset($this->_index[$index]) ) return false;       
      if( !isset($this->_node[$this->_index[$index]]) ) return false;      
      return $this->_node[$this->_index[$index]];
    }    
    self::_printError('Wrong argument type of get() function');      
    return false;  
  }  

  /**
   * Returns a HTML tag name of the first element.
   *
   * @return string|false a current value or this element.
   */
  public function getElementTagName()
  {
    if($this->_length == 0) return false;
    return $this->_node[0]->getElementTagName();
  }
  
  /**
   * Returns an element with the specified ID.
   *
   * @param string $id ID value.
   * @return ElementNode|false searched element.
   */  
  public function getElementById($id)
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->getElementById() );
    return $list->get(0);
  }

  /**
   * Returns child elements with the specified ID of each element.
   *
   * Note: Any valid HTML documents must have only one tag with unique identifier.
   *
   * @param string $id ID value.
   * @return ElementNode|ElementList search result.  
   */  
  public function getElementsById($id)
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->getElementsById($id) );
    return Element::_return($list);
  }   
  
  /**
   * Returns parent elements with the specified ID of each element.
   *
   * Note: Any valid HTML documents must have only one tag with unique identifier.
   *
   * @param string $id ID value.
   * @return ElementNode|ElementList search result.
   */  
  public function getParentsById($id)
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->getParentsById($id) );
    return Element::_return($list);
  } 

  /**
   * Returns child elements with the specified tag name of each element.
   *
   * @param string $name tag name.
   * @return ElementNode|ElementList search result.
   */    
  public function getElementsByTagName($name)
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->getElementsByTagName($name) );
    return Element::_return($list);
  } 

  /**
   * Returns parent elements with the specified tag name of each element.
   *
   * @param string $name tag name.
   * @return ElementNode|ElementList search result.
   */  
  public function getParentsByTagName($name)
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->getParentsByTagName($name) );
    return Element::_return($list);    
  }    
  
  /**
   * Returns child elements with the specified class name of each element.
   *
   * @param string $name class name.
   * @return ElementNode|ElementList search result.
   */  
  public function getElementsByClassName($name)
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->getElementsByClassName($name) );
    return Element::_return($list);    
  }   

  /**
   * Returns parent elements with the specified class name of each element.
   *
   * @param string $name class name.
   * @return ElementNode|ElementList search result.
   */  
  public function getParentsByClassName($name)
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->getParentsByClassName($name) );
    return Element::_return($list);      
  }

  /**
   * Returns child elements with the specified attribute name and its value of each element.
   *
   * @param string $name  attribute name.
   * @param string $value attribute value.
   * @return ElementNode|ElementList search result.
   */  
  public function getElementsByAttr($name, $value=NULL)
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->getElementsByAttr($name, $value) );
    return Element::_return($list);    
  }

  /**
   * Returns parent elements with the specified attribute name and its value of each element.
   *
   * @param string $name  attribute name.
   * @param string $value attribute value.
   * @return ElementNode|ElementList search result.
   */  
  public function getParentsByAttr($name, $value=NULL)
  {
    $list = Element::newList();
    foreach($this->_node as $n) $list->push( $n->getParentsByAttr($name, $value) );
    return Element::_return($list);   
  }

  /**
   * Tests if each element has a given ID value.
   *
   * @param string $id ID value.
   * @return bool true if element has given attribute value.
   */  
  public function isElementsId($id)
  {
    foreach($this->_node as $n) if( $n->isElementsId($id) == false ) return false;
    return true;    
  }  
  
  /**
   * Tests if each element has a given tag name.
   *
   * @param string $name tag name.
   * @return bool true if element has given attribute value.   
   */  
  public function isElementsTagName($name)
  {
    foreach($this->_node as $n) if( $n->isElementsTagName($name) == false ) return false;
    return true;     
  }
  
  /**
   * Tests if each element has a given class name.
   *
   * @param string $name class name.
   * @return bool true if element has given attribute value.
   */  
  public function isElementsClassName($name)
  {
    foreach($this->_node as $n) if( $n->isElementsClassName($name) == false ) return false;
    return true;    
  }   
  
  /**
   * Tests if each element has a given attribute name and value.
   *
   * @param string $name  attribute name.
   * @param string $value attribute value.
   * @return bool true if element has given attribute value.
   */  
  public function isElementsAttr($name, $value=NULL)
  {
    foreach($this->_node as $n) if( $n->isElementsAttr($name, $value) == false ) return false;
    return true;     
  }

  /** 
   * Pushs element or elements list to this list.
   *
   * @param ElementNode|ElementList $arg one element or elements list.
   * @return ElementList this list.
   */
  public function push($node)
  {
    if( ElementNode::isSelf($node) ) return $this->_push($node);
    if( ElementList::isSelf($node) ) foreach($node->_node as $n) $this->_push($n);
    return $this;
  }
  
  /**
   * Tests if given element object is of ElementList class or has ElementList class as one of its parents.
   *
   * @param object $node tested object.
   * @return bool true if element has this class as one of its parents.
   */  
  public static function isSelf($node)
  {
    if( is_a($node, get_class()) ) return true;
    return false;
  }

  /**
   * Removes elements from this list for matched given elements.
   *
   * @param ElementList $nodes elements list.
   * @return ElementList new list.
   */      
  private function _not($nodes)
  {
    $list = Element::newList();      
    // Parse self elements
    foreach($this->_node as $self )
    {
      // Parse given elements      
      foreach( $nodes->_node as $node )
        if($node === $self) continue 2;
      $list->push( $self );
    }
    return $list;
  }  

  /**
   * Filters this list elements.
   *
   * @param string $query query string.
   * @return ElementList new list.
   */    
  private function _filter($query)
  {
    $match = '';
    $nextQuery = '';
    $whatFind = self::_findWhat($query, $match, $nextQuery);
    self::_findWhatDump($whatFind, $query, $match, $nextQuery);
    $list = $this->_filterNew( $whatFind, $match );        
    if( !empty($nextQuery) ) return $list->_filter($nextQuery);    
    return $list;
  } 

  /**
   * Filters list of new elements.
   *
   * @param int    $whatFind
   * @param string $match   
   * @return ElementList new list.
   */    
  private function _filterNew($whatFind, $match)
  {
    $list = Element::newList();
    switch( $whatFind )
    {
      // Filtering by ID
      case self::FIND_FILTER_ID:
      // Filtering by class name
      case self::FIND_FILTER_CLASS:      
      // Filtering by tag name
      case self::FIND_FILTER_TAG: 
      // Filtering by attribute
      case self::FIND_FILTER_ATTR: return $this->_findNew( $whatFind, $match ); 
    }
    return $list;
  }  

  /**
   * Searches parent elements.
   *
   * @param string $query query string.
   * @return ElementList search result.
   */   
  private function _parents($query)
  {
    $match = '';
    $nextQuery = '';
    $whatFind = self::_findWhat($query, $match, $nextQuery);
    self::_findWhatDump( $whatFind, $query, $match, $nextQuery );
    $list = $this->_parentsNew( $whatFind, $match );        
    if( !empty($nextQuery) ) return $list->_parents($nextQuery);    
    return $list;
  }  

  /**
   * Searches parent elements.
   *
   * Method finds new elements relatively self list.
   * Found elements are adding to new list and that list is returning.
   *
   * @param int    $whatFind
   * @param string $match     
   * @return ElementList new list.
   */  
  private function _parentsNew($whatFind, $match)
  {
    $list = Element::newList();
    switch( $whatFind )
    {
      // Searching by ID
      case self::FIND_ID:
      {
        $id = substr($match, 1);
        foreach($this->_node as $node)
          $list->push( $node->getParentsById($id) );
      }
      break;
      // Searching by class name
      case self::FIND_CLASS:
      {
        $className = substr($match, 1);
        foreach($this->_node as $node)
          $list->push( $node->getParentsByClassName($className) );
      }
      break;
      // Searching by tag name
      case self::FIND_TAG:
      {
        $tagName = $match;      
        foreach($this->_node as $node)
          $list->push( $node->getParentsByTagName($tagName) );
      }
      break;
      // Searching by attribute
      case self::FIND_ATTR:
      {
        $attrName = NULL; 
        $attrValue = NULL;
        self::_attrFindWhat($match, $attrName, $attrValue);
        foreach($this->_node as $node)
          $list->push( $node->getParentsByAttr($attrName, $attrValue) );  
      }
      break; 
      // Filtering by ID
      case self::FIND_FILTER_ID:
      // Filtering by class name
      case self::FIND_FILTER_CLASS:      
      // Filtering by tag name
      case self::FIND_FILTER_TAG: 
      // Filtering by attribute
      case self::FIND_FILTER_ATTR: return $this->_findNew( $whatFind, $match ); 
    }
    return $list;
  }  

  /**
   * Searches child elements.
   *
   * @param string $query query string.
   * @return ElementList search result.
   */  
  private function _find( $query )
  {
    $match = '';
    $nextQuery = '';
    $whatFind = self::_findWhat($query, $match, $nextQuery);
    self::_findWhatDump( $whatFind, $query, $match, $nextQuery );
    $list = $this->_findNew( $whatFind, $match );        
    if( !empty($nextQuery) ) return $list->_find($nextQuery);    
    return $list;
  }  

  /**
   * Searches new elements.
   *
   * Method finds new elements relatively self list.
   * Found elements are adding to new list and that list is returning.
   *
   * @param int    $whatFind
   * @param string $match     
   * @return ElementList new list.
   */    
  private function _findNew($whatFind, $match)
  {
    $list = Element::newList();
    switch( $whatFind )
    {
      // Searching by ID
      case self::FIND_ID:
      {
        $id = substr($match, 1);
        foreach($this->_node as $node)
          $list->push( $node->getElementsById($id) );
      }
      break;
      // Searching by class name
      case self::FIND_CLASS:
      {
        $className = substr($match, 1);
        foreach($this->_node as $node)
          $list->push( $node->getElementsByClassName($className) );
      }
      break;
      // Searching by tag name      
      case self::FIND_TAG:
      {
        $tagName = $match;      
        foreach($this->_node as $node)
          $list->push( $node->getElementsByTagName($tagName) );
      }
      break;
      // Searching by attribute
      case self::FIND_ATTR:
      {
        $attrName = NULL; 
        $attrValue = NULL;
        self::_attrFindWhat($match, $attrName, $attrValue);
        foreach($this->_node as $node)
          $list->push( $node->getElementsByAttr($attrName, $attrValue) );  
      }
      break;         
      // Filtering by ID
      case self::FIND_FILTER_ID:
      {
        $id = substr($match, 1);
        foreach($this->_node as $node)
          if( $node->isElementsId($id) == true )
            $list->push( $node );
      }
      break;
      // Filtering by class name
      case self::FIND_FILTER_CLASS:
      {
        $className = substr($match, 1);
        foreach($this->_node as $node)
          if( $node->isElementsClassName($className) == true )
            $list->push( $node );
      }
      break;
      // Filtering by tag name
      case self::FIND_FILTER_TAG:
      {
        $tagName = $match;      
        foreach($this->_node as $node)
          if( $node->isElementsTagName($tagName) == true )
            $list->push( $node );
      }
      break;      
      // Filtering by attribute
      case self::FIND_FILTER_ATTR:
      {
        $attrName = NULL; 
        $attrValue = NULL;
        self::_attrFindWhat($match, $attrName, $attrValue);
        foreach($this->_node as $node)
          if( $node->isElementsAttr($attrName, $attrValue) == true )        
            $list->push( $node ); 
      }
      break;        
    }
    return $list;
  }
  
  /** 
   * Sets attributes.
   *
   * @param string $name
   * @param string $value
   * @return ElementList this list.
   */    
  private function _attr($name, $val)  
  {
    foreach($this->_node as $node) $node->attr($name, $val);
    return $this;
  } 

  /** 
   * Adds new values for an attributes
   *
   * @param string $name
   * @param string $value
   * @return ElementList this list.
   */    
  private function _addAttr($name, $val)  
  {
    foreach($this->_node as $node) $node->addAttr( $name, $val );
    return $this;
  }
  
  /** 
   * Removes attributes.
   *
   * @param string|array $name 
   * @return ElementList this list.
   */    
  private function _removeAttr( $name )  
  {
    foreach($this->_node as $node) $node->removeAttr( $name );
    return $this;
  }
  
  /** 
   * Pushs element to this list.
   *
   * @param ElementNode $node an element.
   * @return ElementList this list.   
   */   
  private function _push($node)
  {
    $this->_node[$this->_length++] = $node;
    $this->key($node->key());
    return $this;
  }

  /**
   * Returns command for searching.
   *
   * @param string &$query
   * @param string &$match   
   * @param string &$nextQuery   
   * @return int
   */
  private static function _findWhat(&$query, &$match, &$nextQuery)
  {
    if( empty($query) ) return self::FIND_VOID;  
    $matchArray = array();
    $reg = array(
      self::FIND_ID =>    '^%s#{1}[a-z0-9\_\-]{1,}',
      self::FIND_CLASS => '^%s\.{1}[a-z0-9\_\-]{1,}',
      self::FIND_TAG =>   '^%s[a-z]{1}[a-z1-6]{0,}',
      self::FIND_ATTR =>  '^%s\[{1}[a-z0-9\_\-]{1,}[=]{0,1}[a-z0-9\_\-.:/ ]{1,}\]{1}'
    );
    $findStr = '[ ]{1}';
    $filterStr = '';
    $find = self::FIND_VOID;
    // Searching
    if(mb_ereg(sprintf($reg[self::FIND_ID], $findStr), $query, $matchArray) !== false )
      $find = self::FIND_ID;
    else if(mb_ereg(sprintf($reg[self::FIND_CLASS], $findStr), $query, $matchArray) !== false )
      $find = self::FIND_CLASS;
    else if(mb_ereg(sprintf($reg[self::FIND_TAG], $findStr), $query, $matchArray) !== false )
      $find = self::FIND_TAG;
    else if(mb_ereg(sprintf($reg[self::FIND_ATTR], $findStr), $query, $matchArray) !== false )
      $find = self::FIND_ATTR;       
    // Filtering
    else if(mb_ereg(sprintf($reg[self::FIND_ID], $filterStr), $query, $matchArray) !== false )
      $find = self::FIND_FILTER_ID;
    else if(mb_ereg(sprintf($reg[self::FIND_CLASS], $filterStr), $query, $matchArray) !== false )
      $find = self::FIND_FILTER_CLASS;
    else if(mb_ereg(sprintf($reg[self::FIND_TAG], $filterStr), $query, $matchArray) !== false )
      $find = self::FIND_FILTER_TAG;
    else if(mb_ereg(sprintf($reg[self::FIND_ATTR], $filterStr), $query, $matchArray) !== false )
      $find = self::FIND_FILTER_ATTR;      
    else
      return $find;
    $explArray = explode($matchArray[0], $query, 2);
    $nextQuery = $explArray[1];
    $match = trim($matchArray[0]);      
    return $find;
  }  

  /**
   * Returns command for searching.
   *
   * @param string $query
   * @param string &$match   
   * @param string &$nextQuery   
   * @return int
   */  
  private static function _attrFindWhat($query, &$attrName, &$attrValue)
  {
    if( empty($query) ) return self::FIND_VOID;  
    $query = mb_substr($query, 1, strlen($query)-2);      
    $matchArray = array();
    $reg = array(
      self::FIND_ATTR_SELF => '^[a-z0-9\_\-]{1,}+$',
      self::FIND_ATTR_EQ =>   '^[a-z0-9\_\-]{1,}[=]{1}[a-z0-9\_\-\.:/ ]{1,}+'
    );
    $find = self::FIND_VOID;
    // Searching 
    if(mb_ereg($reg[self::FIND_ATTR_SELF], $query, $matchArray) !== false )
      $find = self::FIND_ATTR_SELF;
    else if(mb_ereg($reg[self::FIND_ATTR_EQ], $query, $matchArray) !== false )
      $find = self::FIND_ATTR_EQ;
    else
      return $find;
    switch($find)
    {
      case self::FIND_ATTR_SELF: 
      {
        $attrName = $matchArray[0];
      }
      break;
      case self::FIND_ATTR_EQ: 
      {
        $split = mb_split('[=]{1}', $matchArray[0]);    
        $attrName = $split[0];
        $attrValue = $split[1];
      }
      break;
    }
    return $find;
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
   * Dumps searching result.
   */   
  private static function _findWhatDump($whatFind, $query, $match, $nextQuery)
  {
    return;
    static $iter = 0;  
    switch($whatFind)
    {
      case self::FIND_VOID:         $whatFindStr = ' VOID';         break;
      case self::FIND_ID:           $whatFindStr = ' ID';           break;
      case self::FIND_CLASS:        $whatFindStr = ' CLASS';        break;
      case self::FIND_TAG:          $whatFindStr = ' TAG';          break;
      case self::FIND_ATTR:         $whatFindStr = ' ATTR';         break;      
      case self::FIND_FILTER_ID:    $whatFindStr = ' FILTER ID';    break;
      case self::FIND_FILTER_CLASS: $whatFindStr = ' FILTER CLASS'; break;
      case self::FIND_FILTER_TAG:   $whatFindStr = ' FILTER TAG';   break;
      case self::FIND_FILTER_ATTR:  $whatFindStr = ' FILTER ATTR';  break;      
      default:                      $whatFindStr = ' UNDEFINED';    break;      
    }
    echo '<b>ITER:</b>'.($iter++).'<br />';
    echo '<b>WHATFIND:</b>'.$whatFindStr.'<br />';    
    echo '<b>QUERY:</b>'.$query.'<br />';    
    echo '<b>MATCH:</b>'.$match.'<br />';
    echo '<b>NEXTQUERY:</b>'.$nextQuery.'<br />';    
    echo '<br />';        
  }  

  /**
   * Count of elements.
   * @var int
   */
  private $_length;  

  /**
   * Elements array
   * @var ElementNode[]
   */   
  private $_node;
  
  /**
   * Integer and string keys association.
   * @var int[]
   */   
  private $_index;  
}