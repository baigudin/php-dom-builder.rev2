<?php
/** 
 * Single html mark tag.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/html.html 
 */
namespace DomBuilder\ElementNode; 

class TagSingle extends \DomBuilder\ElementNode
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
   * When this method is used to set an element's content, 
   * any content that was in this element is completely replaced by the new content.
   * If element has child elements, set content is ignored and method returns html marks of child elements.
   *
   * @param string $html new HTML string.
   * @param string $lang language key for given html string.         
   * @return string|ElementNode a current value or this element.   
   */
  public function html($html=NULL, $lang=NULL)
  {
    return isset($html) ? $this : '';
  }
  
  /** 
   * Returns this HTML tag.
   * 
   * @return string a self tag.   
   */     
  protected function _tag()
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