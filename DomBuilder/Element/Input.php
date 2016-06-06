<?php
/** 
 * input – input control.
 *
 * The input element is a multipurpose element for representing input controls.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/input.html 
 */
namespace DomBuilder\Element; 

class Input extends \DomBuilder\ElementNode\TagField
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('input')->_tagType(self::TAG_SINGLE)->attr('name', true);    
  }
  
  /** 
   * Checks field for errors.
   * 
   * @return ElementNode this element.
   */   
  public function check()
  {
    return $this->error(false);
  }
  
  /** 
   * Sets a value of 'disabled' attribute.
   *
   * @param bool $value boolean value flag.
   * @return ElementNode this element.
   */      
  public function disabled($value=true)
  {
    if( $value == false ) return $this->removeAttr('disabled');
    else return $this->attr('disabled', 'disabled');
  }
  
  /** 
   * Sets a value of 'readonly' attribute.
   *
   * @param bool $value boolean value flag.
   * @return ElementNode this element.
   */  
  public function readonly($value=true)
  {
    if( $value == false ) return $this->removeAttr('readonly');
    else return $this->attr('readonly', 'readonly');
  }
  
  /** 
   * Sets attribute value.
   *
   * @param string      $name  attribute name.
   * @param string|true $value attribute value or boolean true value for an auto-value of given name.
   * return array attributes array.
   */  
  protected function _attr($name=NULL, $value=true)  
  {
    $name = $this->_prepareAttr($name);
    switch( $name )
    {
      case 'id':
      case 'name':
      {
        if($value === true) $value = $name.'input'.$this->_tagNum();
      }
      break;
      case 'value':
      {
        $value = htmlspecialchars($value, ENT_QUOTES);
      }
      break;      
    }
    return parent::_attr($name, $value);
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