<?php
/** 
 * Element container corresponds to double block HTML tag.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Core\Element; 

abstract class DoubleBlock extends Double
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagType(self::TAG_DOUBLE_BLOCK);
  }
  
  /** 
   * Returns this HTML element with its HTML content.
   * 
   * @return string this element with child elements.
   */
  protected function _element()
  {  
    $text = $this->_text();
    $html = $this->_tagOpen();
    if( !empty($text) ) $html.= self::_lf();
    $html.= $text;        
    $html.= $this->_tagClose();  
    $html.= self::_lf();
    return $html;
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
    return parent::docCompress() ? $html : self::_tabulation($html);
  }    
}