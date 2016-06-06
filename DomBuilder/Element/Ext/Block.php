<?php
/** 
 * ext\block - internal tag string.
 * 
 * Does not contain HTML tags. It is needed for tabulation a context.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software 
 */
namespace DomBuilder\Element\Ext;

class Block extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('block');
  }
  
  /** 
   * Returns this and child HTML tags.
   * 
   * @return string a self tag and including internal tags.   
   */    
  protected function _tag()
  {  
    $text = $this->_text();
    $html = $this->_tagOpen();
    $html.= $text;        
    $html.= $this->_tagClose();  
    return $html;
  }
  
  /** 
   * Returns open tag.
   * 
   * @return string
   */    
  protected function _tagOpen()
  {  
    return '';
  }

  /** 
   * Returns close tag.
   * 
   * @return string
   */    
  protected function _tagClose()
  {  
    return '';
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
    $str = str_replace(self::LF, self::LF.self::TB, $str);
    // Deleting last TB
    return substr($str, 0, strlen($str)-strlen(self::TB));
  }  
}