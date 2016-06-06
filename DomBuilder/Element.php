<?php
/**
 * DOM Element interface.
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder;

abstract class Element
{
  /**
   * XHTML 1.0 document type.
   */    
  const DOC_XHTML_10 = "XHTML 1.0";
  
  /**
   * HTML 4.01 document type.  
   */      
  const DOC_HTML_401 = "HTML 4.01";
  
  /**
   * HTML 5 document type.     
   */
  const DOC_HTML_5 = "HTML 5";
  
  /** 
   * Inserts an element as the last child of each element.
   *
   * @param string|Element $node a string type which containe a name of new tag.
   * @return Element|false new inserted element.
   */  
  public abstract function insert($node);
  
  /** 
   * Inserts an element as the first child of each element.   
   *
   * @param string|Element $node a string type which containe a name of new tag.
   * @return Element|false new inserted element.
   */  
  public abstract function prepend($node);
  
  /** 
   * Inserts an element after each element.
   *   
   * @param string|Element $node a string type which containe a name of new tag.
   * @return Element|false new inserted element.
   */  
  public abstract function after($node);
  
  /** 
   * Inserts an element before each element.
   *   
   * @param string|Element $node a string type which containe a name of new tag.
   * @return Element|false new inserted element.
   */   
  public abstract function before($node);
  
  /** 
   * Removes each element.
   * 
   * @return Element removed elements.
   */   
  public abstract function remove();
  
  /** 
   * Returns root elements of each element.
   * 
   * @return Element root elements.
   */
  public abstract function getRoot();
  
  /**
   * Returns the number of elements.
   *
   * @return int
   */  
  public abstract function length();
  
  /**
   * Returns previous elements.
   *
   * @return Element|null previous elements.
   */  
  public abstract function prev();
  
  /**
   * Returns next elements.
   *
   * @return Element|null next elements.
   */  
  public abstract function next();
  
  /**
   * Returns child elements.
   *
   * @param int $number a sequence number of child elements.
   * @return Element|null child elements.
   */  
  public abstract function child($number=0);
  
  /**
   * Returns last child elements.
   *
   * @return Element|null last child elements.
   */  
  public abstract function last();

  /**
   * Returns parent elements.
   *
   * @return Element|null parent elements.
   */  
  public abstract function parent();
  
  /** 
   * Returns or sets a HTML content of this element.
   *
   * This method is used to set a HTML element's content, and
   * any content that was in this element is completely replaced by the new content.
   * If an element has child elements, set content is ignored and method returns HTML marks of child elements.
   *
   * @param string $html new HTML string.
   * @param string $lang language key for given html string.   
   * @return string|Element a current value or this element.   
   */
  public abstract function html($html=NULL, $lang=NULL);  
  
  /** 
   * Returns or sets a text content of this element.
   *
   * Unlike the html method, this method converts HTML special characters of given text string to HTML entities,
   * or returns converted child elements HTML marks. As the html method, text method ignores set string 
   * if an element has child elements.
   *
   * @param string $text new text string.
   * @param string $lang language key for given html string.   
   * @return string|Element a current value or this element.   
   */
  public abstract function text($text=NULL, $lang=NULL);
  
  /**
   * Returns or sets any user data of each element.
   *
   * Method returns a user data of the first element or 
   * sets given data of each element of this list.
   *
   * @param mixed  $data any data.
   * @param string $lang language key for given data.      
   * @return mixed|Element a data of the first element or this list.   
   */  
  public abstract function data($data=NULL, $lang=NULL);
  
  /** 
   * Returns or sets a string key.
   *
   * Method returns a key of the last element or
   * sets a key for last added element.
   *
   * @param string $key a string key.
   * @return string|Element a key of the last element or this list.
   */
  public abstract function key($key=NULL);
  
  /**
   * Returns a children of each element.
   *
   * @return Element children elements of each element.
   */
  public abstract function children();  
  
  /**
   * Removes elements from this list for matched elements by the query.
   *
   * Method removes elements from this list by given query.
   * Requested child tags from query string are not processing.
   *
   * @param string|Element $query query string, Element object.
   * @return Element new list.
   */
  public abstract function not($query);
  
  /**
   * Filters this list elements by the query.
   *
   * Method returns elements from this list which matching by the query.
   * Requested child tags from query string are not processing.
   *
   * @param string $query query string.
   * @return Element new list.
   */  
  public abstract function filter($query);
  
  /**
   * Searches parent elements.
   *
   * @param string $query query string.
   * @return Element search result.
   */    
  public abstract function parents($query);
  
  /**
   * Searches child elements.
   *
   * @param string $query query string.
   * @return Element search result.
   */   
  public abstract function find($query);
  
  /** 
   * Adds new class attribute value for this list elements.
   *
   * Sets new value for class attribute. 
   * If class attribute is set, the method adds new value of attribute.
   *
   * @param string $value new class attribute value.
   * @return Element this list.
   */   
  public abstract function addClass($value);
  
  /** 
   * Removes class attribute value for this list elements.
   *
   * @param string $value class attribute value.
   * @return Element this list.
   */   
  public abstract function removeClass($value);
  
  /**
   * Tests if each element has a given class name.
   *
   * @param string $name class name.
   * @return bool true if element has given attribute value.
   */
  public abstract function hasClass($name);  
  
  /** 
   * Returns attribute value or sets attributes and its values.
   *
   * Sets new value for given attribute. 
   * If attribute is set, the method sets new given value of attribute.   
   *
   * @param string|array $name  string with attribute name or array where 
   *                            key is attribute name and value is attribute value.
   * @param string       $value given attribute name value. 
   *                            if first argument is given as array type, 
   *                            this field is skipped.
   * @return string|Element a current value or this element.      
   */   
  public abstract function attr($name, $value=NULL);
  
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
   * @return Element this list.
   */  
  public abstract function addAttr($name, $value=NULL);
  
  /** 
   * Removes attributes for each element.
   *
   * @param string|array $name string with attribute name or array where 
   *                           key is attribute name and value is attribute value.
   * @return Element this list.
   */    
  public abstract function removeAttr($name);  
  
  /** 
   * Returns an element of this list or elements array.
   *
   * The method returns an elements array as vector if argument in not given.
   * If argument greater than or equal zero, method returns an element with given index.
   * If argument less than zero, method counts a index from the end of the list.
   * For example: [-1] returns the last element, [-2] returns the penultimate element, etc.
   *
   * @param int|string $index element index of this elements list or associative string key.   
   * @return Element|Element[]|false an element for integer or string argument, elements array if argument in not given.
   */  
  public abstract function get($index=NULL);
  
  /**
   * Returns a HTML tag name of the first element.
   *
   * @return string|false a current value or this element.
   */  
  public abstract function getElementTagName();

  /**
   * Returns an element with the specified ID.
   *
   * @param string $id ID value.
   * @return Element|false searched element.
   */   
  public abstract function getElementById($id);
  
  /**
   * Returns child elements with the specified ID of each element.
   *
   * Note: Any valid HTML documents must have only one tag with unique identifier.
   *
   * @param string $id ID value.
   * @return Element search result.  
   */  
  public abstract function getElementsById($id);
  
  /**
   * Returns parent elements with the specified ID of each element.
   *
   * Note: Any valid HTML documents must have only one tag with unique identifier.
   *
   * @param string $id ID value.
   * @return Element search result.
   */   
  public abstract function getParentsById($id);
  
  /**
   * Returns child elements with the specified tag name of each element.
   *
   * @param string $name tag name.
   * @return Element search result.
   */    
  public abstract function getElementsByTagName($name);
  
  /**
   * Returns parent elements with the specified tag name of each element.
   *
   * @param string $name tag name.
   * @return Element search result.
   */  
  public abstract function getParentsByTagName($name);
  
  /**
   * Returns child elements with the specified class name of each element.
   *
   * @param string $name class name.
   * @return Element search result.
   */   
  public abstract function getElementsByClassName($name);
  
  /**
   * Returns parent elements with the specified class name of each element.
   *
   * @param string $name class name.
   * @return Element search result.
   */   
  public abstract function getParentsByClassName($name);
  
  /**
   * Returns child elements with the specified attribute name and its value of each element.
   *
   * @param string $name  attribute name.
   * @param string $value attribute value.
   * @return Element search result.
   */  
  public abstract function getElementsByAttr($name, $value=NULL);
  
  /**
   * Returns parent elements with the specified attribute name and its value of each element.
   *
   * @param string $name  attribute name.
   * @param string $value attribute value.
   * @return Element search result.
   */  
  public abstract function getParentsByAttr($name, $value=NULL);
  
  /**
   * Tests if each element has a given ID value.
   *
   * @param string $id ID value.
   * @return bool true if element has given attribute value.
   */   
  public abstract function isElementsId($id);

  /**
   * Tests if each element has a given tag name.
   *
   * @param string $name tag name.
   * @return bool true if element has given attribute value.   
   */ 
  public abstract function isElementsTagName($name);
  
  /**
   * Tests if each element has a given class name.
   *
   * @param string $name class name.
   * @return bool true if element has given attribute value.
   */  
  public abstract function isElementsClassName($name);
  
  /**
   * Tests if each element has a given attribute name and value.
   *
   * @param string $name  attribute name.
   * @param string $value attribute value.
   * @return bool true if element has given attribute value.
   */   
  public abstract function isElementsAttr($name, $value=NULL);
  
  /** 
   * Returns the HTML document.
   * 
   * @param Element $node root element.   
   * @return string specified HTML document.
   */
  public static function getDocument($node)  
  {
    $doc = Element::create();
    $doc->insert($node);
    $html = '';
    switch( self::docType() )
    {
      case self::DOC_XHTML_10: 
        $html.= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'."\n"; 
      break;        
      case self::DOC_HTML_401: 
        $html.= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">'."\n"; 
      break;
      case self::DOC_HTML_5: 
        $html.= '<!DOCTYPE HTML>'."\n"; 
      break;
    }
    $html.= $doc->html();
    return $html;
  }  

  /** 
   * Creates a new element.
   * 
   * @param string $name tag name of new element.
   * @return Element created element.
   */
  public static function create($name='')
  {
    $ch = substr($name, 0, 1);
    if($ch == '/' || $ch == '\\') 
    {
      $class = str_replace('/', '\\', $name);
      return new $class();
    }
    return self::newNode($name);
  }
  
  /** 
   * Creates a new element node.
   * 
   * @param string $name tag name of new element.
   * @return Element created element.
   */
  public static function newNode($name='')
  {
    $class = empty($name) ? 'DomBuilder\ElementNode' : 'DomBuilder\Element';
    if( !empty($name) ) $class.= '\\'.str_replace('/', '\\', $name);
    return new $class();
  }
  
  /** 
   * Creates a new element list.
   * 
   * @return Element created element.
   */
  public static function newList()
  {
    return new ElementList();
  }

  /**
   * Tests if given object is of ElementNode class or has ElementNode class as one of its parents.
   *
   * @param object $node tested object.
   * @return bool true if object has this class as one of its parents.     
   */  
  public static function isNode($node)
  {
    return ElementNode::isSelf($node);
  }
  
  /**
   * Tests if given element object is of ElementList class or has ElementList class as one of its parents.
   *
   * @param object $node tested object.
   * @return bool true if element has this class as one of its parents.     
   */  
  public static function isList($node)
  {
    return ElementList::isSelf($node);
  }  
  
  /** 
   * Returns and sets HTML document type.
   * 
   * @param string $docType any DOC_XHTML_10 or DOC_HTML_401 or DOC_HTML_5 constans.   
   * @return string HTML document type.
   */
  public static function docType($docType=NULL)
  {
    if( !isset($docType) ) return self::$_docType;
    switch($docType)
    {
      case self::DOC_XHTML_10: 
      case self::DOC_HTML_401:
      case self::DOC_HTML_5: 
      {
        self::$_docType = $docType; 
      }
      break;
    }    
    return self::$_docType;
  }
  
  /** 
   * Returns and sets document compress flag.
   * 
   * @param bool $docCompress new document compress flag.
   * @return bool document compress flag.
   */
  public static function docCompress($docCompress=NULL)
  {
    if( !isset($docCompress) ) return self::$_docCompress;
    if( !is_bool($docCompress) ) return self::$_docCompress;    
    self::$_docCompress = $docCompress;    
    return self::$_docCompress;
  }
  
  /** 
   * Returns and sets document language.
   *
   * This value is used as default value for lang attribute.
   * 
   * @param string $docLang document language.
   * @return string current document language.
   */
  public static function docLanguage($docLang=NULL)
  {
    if( !isset($docLang) ) return self::$_docLang;
    if( !empty($docLang) ) self::$_docLang = $docLang;    
    return self::$_docLang;
  }  
  
  /** 
   * Returns and sets a print errors flag.
   * 
   * @param bool $printError new print errors flag.
   * @return bool print errors flag.
   */
  public static function printError($printError=NULL)
  {
    if( !isset($printError) ) return self::$_printError;
    if( !is_bool($printError) ) return self::$_printError;    
    self::$_printError = $printError;    
    return self::$_printError;    
  }
  
  /** 
   * Returns an object of Element interface.
   *
   * @param ElementList $list an element list.
   * @return ElementNode|ElementList object of Element interface.
   */   
  protected static function _return($list)
  {  
    return ($list->length() != 1) ? $list : $list->get(0);
  }

  /**
   * Print error flag.
   * @var bool
   */
  private static $_printError = true;
  
  /**
   * Document compress flag.   
   * @var bool
   */
  private static $_docCompress = true;
  
  /**
   * Document type generator flag.
   * @var string
   */  
  private static $_docType = self::DOC_XHTML_10;    
  
  /**
   * Document language.   
   * @var string
   */
  private static $_docLang = 'en';  
}