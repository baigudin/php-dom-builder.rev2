<?php
/** 
 * select – option-selection form control.
 *
 * The select element represents a control for selecting among a list of options.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/select.html
 */
namespace DomBuilder\Element; 

class Select extends \DomBuilder\ElementNode\TagField
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_option = array();
    $this->_tagName('select')->_tagType(self::TAG_DOUBLE_BLOCK)->attr('name', true);
  } 

  /** 
   * Sets a internal option elements.
   *
   * @param array $option options.
   * @return ElementNode this element.
   */   
  public function setOption($option)
  {
    if( !is_array($option) ) return $this;
    $this->_option = $option;
    foreach($this->_option as $k=>$v) $this->insert('option')->attrValue($k)->html($v);
    return $this;
  }
  
  /** 
   * Checks field for errors.
   * 
   * @return ElementNode this element.
   */   
  public function check()
  {
    $value = $this->value();
    // If field value was not sent from browser
    if( $value === false ) 
      return $this->error(true)->errorStr(self::_lang('Значение не передано'));
    // If field must be filled, but it must not be
    else if( ($this->fill()===true) && empty($value) && ($value!=='0') )
      return $this->error(true)->errorStr(self::_lang('Не заполнено'));
    // If field must not be filled and it must not be    
    else if( ($this->fill()===false) && empty($value) ) 
      return $this->error(false);      
    // If regular expression is not given
    else if( $this->_checkOption($value) === false )
      return $this->error(true)->errorStr(self::_lang('Содержит недопустимые значение'));
    else
      return $this->error(false);
  }

  /** 
   * Получение тега с содержимым HTML узла
   *
   * @return string
   */     
  protected function _tag()
  {
    $value = $this->value();
    if( $value === false ) $value = $this->_value();
    if( $value !== false ) $this->_setOption($value);
    $text = $this->_text();
    $html = $this->_tagOpen();
    if( !empty($text) ) $html.= self::_lf();
    $html.= $text;        
    $html.= $this->_tagClose();  
    $html.= self::_lf();
    return $html;    
  }
  
  /** 
   * Sets field value.   
   */     
  private function _setOption($value)
  {
    $option = $this->find('option[value='.$value.']');
    if( $option->length() == 1 ) $option->selected(true);  
  }   

  /** 
   * Checks field value.   
   *
   * @return bool
   */     
  private function _checkOption($value)
  {
    $option = $this->find('option[value='.$value.']');
    if( $option->length() == 0 ) return false;
    return true;  
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
        if($value === true) $value = $name.'select'.$this->_tagNum();
      }
      break;    
    }
    return parent::_attr($name, $value);
  }    
 
  /**
   * Массив вложенных тегов option
   * @var array
   */  
  private $_option;
}