<?php
/** 
 * title – document title.
 *
 * The title element represents the document’s title or name.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/title.html
 */
namespace DomBuilder\Element; 

class Title extends \DomBuilder\Core\Element\DoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('title');
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