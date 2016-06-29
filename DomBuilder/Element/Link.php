<?php
/** 
 * link – inter-document relationship metadata.
 *
 * The link element represents metadata that expresses inter-document relationships.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/link.html 
 */
namespace DomBuilder\Element; 

class Link extends \DomBuilder\Core\Element\Single
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('link');                
  }

  /** 
   * Sets this element as 'text/css' type.
   *
   * @param string $href a value of 'href' attribute.
   * @return Link this element.
   */
  public function typeText($href)
  {
    return $this->attr( array('rel'=>'stylesheet', 'type'=>'text/css', 'href'=>$href, 'media'=>'all') );
  }  

  /** 
   * Sets tag as 'image/x-icon' type.
   *
   * @param string $href a value of 'href' attribute.
   * @return Link this element.  
   */
  public function typeImage($href)
  {
    return $this->attr( array('rel'=>'shortcut icon', 'type'=>'image/x-icon', 'href'=>$href) );
  }

  /** 
   * Returns this and child HTML tags.
   * 
   * @return string a self tag and including internal tags.
   */
  protected function _element()
  {
    switch( self::docType() )
    {
      case self::DOC_XHTML_10: $html = '<'.$this->_tagName().$this->_tagAttr().'></'.$this->_tagName().'>'; break;
      case self::DOC_HTML_401:
      case self::DOC_HTML_5: $html = '<'.$this->_tagName().$this->_tagAttr().'>'; break;
    }
    if( $this->parent() != NULL && $this->parent()->_tagType() == self::TAG_DOUBLE_BLOCK ) $html.= self::_lf();
    return $html;  
  }   
}