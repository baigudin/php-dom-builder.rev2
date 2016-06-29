<?php
/** 
 * input type=text – text-input.
 *
 * The input element with a type attribute whose value is "text" represents 
 * a one-line plain text edit control for the input element's value.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/input.text.html
 */
namespace DomBuilder\Element\Input; 

class Text extends \DomBuilder\Element\Input
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->attr('type', 'text');
  }

  /** 
   * Checks field for errors.
   * 
   * @return ElementNode this element.
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
   * @return string|Text a current value or this element.
   */   
  public function maxlength($value=NULL)
  {
    return $this->attr('maxlength', $value);
  }
  
  /** 
   * Returns this and child HTML tags.
   * 
   * @return string a self tag and including internal tags.
   */     
  protected function _element()
  {
    // If user did not set a value attribute by attr method,
    // method sets this value attribute from value method.
    if( $this->attr('value') == '' )
    {
      $value = $this->value();
      if( $value === false ) $value = $this->_value();
      if( $value !== false ) $this->attr('value', $value);
    }    
    return parent::_element();
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