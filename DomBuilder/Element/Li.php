<?php
/** 
 * li – list item.
 *
 * The li element represents a list item.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/li.html 
 */
namespace DomBuilder\Element; 

class Li extends \DomBuilder\ElementNode\TagDoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('li');
  }
  
  /** 
   * Returns this HTML tags.
   * 
   * @return string a self tag.   
   */   
  protected function _tag()
  {  
    $text = $this->_text();  
    $html = $this->_tagOpen();
    $html.= $text;        
    $html.= $this->_tagClose();          
    $html.= self::_lf();    
    return $html;
  }   
}