<?php
/** 
 * input type=checkbox – checkbox.
 *
 * The input element with a type attribute whose value is "checkbox" represents a state or option that can be toggled.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/input.checkbox.html
 */
namespace DomBuilder\Element\Input; 

class Checkbox extends \DomBuilder\Element\Input
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->attr('type', 'checkbox');
  }
  
  /** 
   * Checks field for errors.
   * 
   * @return ElementNode this element.
   */   
  public function check()
  {
    $value = $this->value();
    if( $this->fill()===true && $value===false )        
      return $this->checked((bool)$value)->error(true)->errorStr(self::_lang('Флаг не установлен'));
    return $this->checked((bool)$value)->error(false);     
  }
  
  /** 
   * Sets a value of 'checked' attribute.
   *
   * @param bool $value boolean value flag.
   * @return ElementNode this element.
   */    
  public function checked($checked=true)
  {
    if( $checked == false ) return $this->removeAttr('checked');
    else return $this->attr('checked', 'checked');
  }  
 
  /** 
   * Returns this HTML tag.
   * 
   * @return string a self tag.   
   */    
  protected function _tag()
  {
    $value = $this->value();
    if( $value !== false ) $this->checked();
    return parent::_tag();
  }
}