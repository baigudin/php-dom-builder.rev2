<?php
/** 
 * Double html mark tag.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/html.html 
 */
namespace DomBuilder\ElementNode; 

class TagDouble extends \DomBuilder\ElementNode
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
  }
  
  /** 
   * Returns content of double tag.
   * 
   * @return string
   */   
  protected final function _text()
  { 
    $html = $this->html();  
    if( strlen($html) == 0 ) return '';  
    if( parent::docCompress() == true ) return $html;
    if( $this->_tagType() == self::TAG_DOUBLE_INLINE ) return $html;
    return self::_tabulation($html);
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
   * Returns open tag.
   * 
   * @return string
   */    
  protected function _tagOpen()
  {  
    return '<'.$this->_tagName().$this->_tagAttr().'>';
  }

  /** 
   * Returns close tag.
   * 
   * @return string
   */    
  protected function _tagClose()
  {  
    return '</'.$this->_tagName().'>';
  }  
}