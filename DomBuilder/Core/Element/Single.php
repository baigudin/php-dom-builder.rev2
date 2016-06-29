<?php
/** 
 * Element container corresponds to single HTML tag.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Core\Element; 

abstract class Single extends \DomBuilder\Core\Element
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagType(self::TAG_SINGLE);
  }
  
  /** 
   * Returns or sets a HTML content of this element.
   *
   * @param string $html new HTML string.
   * @param string $lang language key for given html string.         
   * @return string|Single a current value or this element.   
   */
  public function html($html=NULL, $lang=NULL)
  {
    return isset($html) ? $this : '';
  }
  
  /** 
   * Returns this HTML element with its HTML content.
   * 
   * @return string this element with child elements.
   */
  protected function _element()
  {
    $html = '<'.$this->_tagName().$this->_tagAttr();
    switch( self::docType() )
    {
      case self::DOC_XHTML_10: $html.= ' />'; break;
      case self::DOC_HTML_401:
      case self::DOC_HTML_5: $html.= '>'; break;
    }
    if( $this->parent() != NULL && $this->parent()->_tagType() == self::TAG_DOUBLE_BLOCK ) $html.= self::_lf();
    return $html;  
  }
}