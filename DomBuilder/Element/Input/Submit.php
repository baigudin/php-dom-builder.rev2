<?php
/** 
 * input type=submit – submit button.
 *
 * The input element with a type attribute whose value is "submit" represents a button for submitting a form.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/input.submit.html
 */
namespace DomBuilder\Element\Input; 

class Submit extends \DomBuilder\Element\Input
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->attr('type', 'submit');
  } 
  
  /** 
   * Returns this and child HTML tags.
   * 
   * @return string a self tag and including internal tags.
   */     
  protected function _tag()
  {
    // If user did not set a value attribute by attr method,
    // method sets this value attribute from value method.
    if( $this->attr('value') == '' )
    {
      $value = $this->value();
      if( $value === false ) $value = $this->_value();
      if( $value !== false ) $this->attr('value', $value);
    }    
    return parent::_tag();
  }  
}