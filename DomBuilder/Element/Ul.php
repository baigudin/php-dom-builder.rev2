<?php
/** 
 * ul – unordered list.
 *
 * The ul element represents an unordered list of items; that is, a list in which changing the order 
 * of the items would not change the meaning of list.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/ul.html
 */
namespace DomBuilder\Element; 

class Ul extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('ul');
  }
  
  /** 
   * Returns this and child HTML tags.
   * 
   * @return string a self tag and including internal tags.   
   */    
  protected function _tag()
  { 
    $inLi =  true;  
    if(self::docCompress() == true || $this->parents('li')->length() != 0) $inLi = false;
    $text = $this->_text();
    $html = '';
    if($inLi == true) $html.= self::_lf();
    $html.= $this->_tagOpen();
    if( !empty($text) ) $html.= self::_lf();
    $html.= $text;
    $html.= $this->_tagClose();  
    $html.= self::_lf();
    if($inLi == false) return $html;
    return $this->_tabulation($html);    
  }    
}