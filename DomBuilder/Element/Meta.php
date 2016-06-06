<?php
/** 
 * meta – metadata.
 *
 * The meta element is a multipurpose element for representing metadata.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/meta.html 
 */
namespace DomBuilder\Element; 

class Meta extends \DomBuilder\ElementNode\TagSingle
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('meta');
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
}