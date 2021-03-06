<?php
/** 
 * ol – ordered list.
 *
 * The ol element represents a list (or sequence) of items; 
 * that is, a list in which the items are intentionally ordered, 
 * such that changing the order would change the meaning of the list.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/ol.html 
 */
namespace DomBuilder\Element; 

class Ol extends \DomBuilder\Core\Element\DoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('ol');
  }
 
  /** 
   * Returns this and child HTML tags.
   * 
   * @return string a self tag and including internal tags.   
   */   
  protected function _element()
  {  
    $text = $this->_text();  
    $html = $this->_tagOpen();
    $html.= $text;        
    $html.= $this->_tagClose();          
    $html.= self::_lf();        
    return $html;
  }   
}