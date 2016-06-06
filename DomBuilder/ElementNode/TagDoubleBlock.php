<?php
/** 
 * Double block html mark tag.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/html.html 
 */
namespace DomBuilder\ElementNode; 

class TagDoubleBlock extends \DomBuilder\ElementNode\TagDouble
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
   * Returns this and child HTML tags.
   * 
   * @return string a self tag and including internal tags.   
   */    
  protected function _tag()
  {  
    $text = $this->_text();
    $html = $this->_tagOpen();
    if( !empty($text) ) $html.= self::_lf();
    $html.= $text;        
    $html.= $this->_tagClose();  
    $html.= self::_lf();
    return $html;
  }  
}