<?php
/**
 * Main class for Document Object Model operating.
 * 
 * The root class of some html elements that declares abstarct and static methods 
 * for operating with DOM tree and HTML document.
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder;

use \DomBuilder\Api\Builder;
use \DomBuilder\Api\Property;
use \DomBuilder\Api\Attribute;
use \DomBuilder\Api\Traverse;
use \DomBuilder\Api\Fetch;
use \DomBuilder\Api\Search;
use \DomBuilder\Api\Tester;

abstract class Element implements Builder, Property, Attribute, Traverse, Fetch, Search, Tester
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
   * Returns the HTML document.
   * 
   * @param Element $node root element.   
   * @return string specified HTML document.
   */
  public static function getDocument($node)  
  {
    $doc = self::create();
    $doc->insert($node);
    $html = '';
    switch( self::docType() )
    {
      case self::DOC_XHTML_10: 
      {
        $html.= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"';
        $html.= ' "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'."\n"; 
      }
      break;        
      case self::DOC_HTML_401: 
      {
        $html.= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"';
        $html.= ' "http://www.w3.org/TR/html4/loose.dtd">'."\n"; 
      }
      break;
      case self::DOC_HTML_5: 
      {
        $html.= '<!DOCTYPE HTML>'."\n"; 
      }
      break;
    }
    $html.= $doc->html();
    return $html;
  }  

  /** 
   * Creates a new element.
   *
   * The method returns the default element node container if argument is defaulted 
   * or special element node container for given tag name 
   * if the first character of argument is not a slash or back slash character.
   * It means that the method builds a class relatively of self namespace, otherwise
   * a class is built by full given name relatively of root namespace. 
   * Note: Relative classes of root namespace may be some extensions of this library.
   *
   * @param string $name a tag name of new element.
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
   * Creates a new element node container.
   *
   * The method returns the default element node container if argument is defaulted 
   * or special element node container for given tag name    
   * 
   * @param string $name a tag name of new element.
   * @return Element created element node container.
   */
  public static function newNode($name='')
  {
    if( empty($name) ) return new Core\Element\Root();
    $name = str_replace('/', '\\', $name);
    $class = 'DomBuilder\\Element\\'.$name;
    return new $class();
  }
  
  /** 
   * Creates a new elements list container.
   * 
   * @return Element created elements list container.
   */
  public static function newList()
  {
    return new Core\ElementList();
  }

  /**
   * Tests if given object is an element node container.
   *
   * @param object $node tested object.
   * @return bool true if object is an element node.     
   */  
  public static function isNode($node)
  {
    return Core\Element::isSelf($node);
  }
  
  /**
   * Tests if given object is an elements list container.
   *
   * @param object $node tested object.
   * @return bool true if object is an elements list.      
   */  
  public static function isList($node)
  {
    return Core\ElementList::isSelf($node);
  }  
  
  /** 
   * Returns and sets HTML document type.
   * 
   * @param string $docType one of DOC_XHTML_10, DOC_HTML_401, or DOC_HTML_5 constans.   
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
   * @param Core\ElementList $list an elements list.
   * @return Core\Element|Core\ElementList object of Element interface.
   */   
  protected static function _return($list)
  {  
    return $list->length() != 1 ? $list : $list->get(0);
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