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

class Link extends \DomBuilder\ElementNode\TagSingle
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
   * Returns this HTML tag.
   * 
   * @return string a self tag.   
   */     
  protected function _tag()
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
  
  /** 
   * Sets tag as 'text/css' type and that value of 'href' attribute.
   *
   * @param string $href given attribute name value.
   * @return ElementNode this element.
   */
  public function typeCss($href)
  {
    return $this->attr( array('rel'=>'stylesheet', 'type'=>'text/css', 'href'=>$href, 'media'=>'all') );
  }  

  /** 
   * Sets tag as 'image/x-icon' type and that value of 'href' attribute.
   *
   * @param string $href given attribute name value.
   * @return ElementNode this element.  
   */
  public function typeIcon($href)
  {
    return $this->attr( array('rel'=>'shortcut icon', 'type'=>'image/x-icon', 'href'=>$href) );
  }   
}