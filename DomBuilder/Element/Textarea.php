<?php
/** 
 * textarea – text input area.
 *
 * The textarea element represents a multi-line plain-text edit control for the element’s raw value.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/textarea.html
 */
namespace DomBuilder\Element; 

class Textarea extends \DomBuilder\Core\Element\Field
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('textarea')->_tagType(self::TAG_DOUBLE_INLINE)
      ->attr('name', true)
      ->attr('rows', '3')->attr('cols', '6');    
  }
  
  /** 
   * Checks field for errors.
   * 
   * @return Textarea this element.
   */   
  public function check()
  {
    $value = $this->value();        
    // If maximum length is mismatched. 
    if( $this->_checkMaxLength() == false )
      return $this->error(true)->errorStr(self::_lang('Содержит недопустимое количество символов'));    
    // If field value was not sent from browser
    else if( $value === false ) 
      return $this->error(true)->errorStr(self::_lang('Значение не передано'));
    // If field must be filled, but it must not be
    else if( ($this->fill()===true) && empty($value) && ($value!=='0') )
      return $this->error(true)->errorStr(self::_lang('Не заполнено'));
    // If field must not be filled and it must not be    
    else if( ($this->fill()===false) && empty($value) ) 
      return $this->error(false);      
    // If regular expression is not given
    else if( $this->reg() == '' ) 
      return $this->error(false);        
    // If error by regular expression 
    else if( mb_ereg($this->reg(), $value)===false )
      return $this->error(true)->errorStr(self::_lang('Содержит недопустимые символы'));
    else
      return $this->error(false);      
  }

  /** 
   * Returns or sets a value of 'maxlength' attribute.
   *
   * @param string $value attribute value.
   * @return string|Textarea a current value or this element.
   */    
  public function maxlength($value=NULL)
  {
    return $this->attr('maxlength', $value);
  }  

  /** 
   * Sets values of 'rows' and 'cols' attributes.
   *
   * @param string|int $cols cols attribute name value.
   * @param string|int $rows rows attribute name value.   
   * @return Textarea this element.   
   */  
  public function size($cols='', $rows='')
  {
    return $this->attr('rows', $rows)->attr('cols', $cols);
  }
  
  /** 
   * Returns this and child HTML tags.
   * 
   * @return string a self tag and including internal tags.   
   */   
  protected function _element()
  { 
    $html = '';  
    $text = $this->_text();  
    $value = $this->value();
    if( $value === false ) $value = $this->_value();
    if( $value !== false ) $html = $this->_jsValue($value);
    return $this->_tagOpen().$text.$this->_tagClose().$html;
  }  

  /** 
   * Returns attributes string for open tag.
   * 
   * @return string
   */     
  protected function _tagAttr()
  {
    $value = $this->maxlength();
    if( empty($value) ) return parent::_tagAttr();
    $this->removeAttr('maxlength');
    $attr = parent::_tagAttr();
    $this->maxlength($value);
    return $attr;
  }

  /** 
   * Includes js code for initializing a field.
   * 
   * @param string $value
   * @return string
   */   
  private function _jsValue($value)
  {
    if( strlen($value) == 0 ) return '';
    $id = $this->attr('id', true)->attr('id');
    $code = 'document.getElementById("'.$id.'").value='.json_encode($value).';';
    $this->after('script')->javascript()->program($code);
    return self::LF;
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
        if($value === true) $value = $name.'textarea'.$this->_tagNum();
      }
      break;    
    }
    return parent::_attr($name, $value);
  }   

  /** 
   * Checks maximum length.
   * 
   * @param string $value
   * @return bool
   */    
  private function _checkMaxLength()  
  {
    $maxlength = $this->maxlength();
    if( empty($maxlength) ) return true;
    $value = $this->value();
    if( mb_strlen($value) <= $maxlength) return true;
    return false;
  }  
}