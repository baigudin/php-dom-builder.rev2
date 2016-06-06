<?php
/** 
 * input type=radio – radio button.
 *
 * The input element with a type attribute whose value is "radio" represents 
 * a selection of one item from a list of items (a radio button).
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/input.radio.html
 */
namespace DomBuilder\Element\Input; 

class Radio extends \DomBuilder\Element\Input
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->attr('type', 'radio');
  } 
  
  /** 
   * Checks field for errors.
   * 
   * @return ElementNode this element.
   */
  public function check()
  {
    $name = $this->attrName();
    $value = $this->value();
    if( $this->fill()===true && $value===false )
      return $this->checked((bool)$value)->error(true)->errorStr(self::_lang('Переключатель не установлен'));
    else if( !isset(self::$_attrName[$name][$value]) )
      return $this->checked((bool)$value)->error(true)->errorStr('Содержит недопустимые значение');
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
    if( $value !== false )
    {
      if($this->_value() == $value) $this->checked(true);
      else $this->checked(false);    
    }
    return parent::_tag();
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
    $attr = parent::_attr($name, $value);
    $this->_attrName($attr);
    return $attr;
  }    
  
  /** 
   * Stets attaName array.
   *
   * @param array $attr attributes array.
   */    
  private function _attrName($attr)
  {
    if( !isset($attr['name']) || !isset($attr['value']) ) return;
    self::$_attrName[$attr['name']][$attr['value']] = true;
  }
  
  /**
   * Flag of necessity to fill fields.
   * @var bool
   */   
  static private $_attrName = array();    
}