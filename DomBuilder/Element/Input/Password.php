<?php
/** 
 * input type=password – password-input field
 *
 * The input element with a type attribute whose value is "password" represents 
 * a one-line plain-text edit control for entering a password.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/input.password.html
 */
namespace DomBuilder\Element\Input; 

class Password extends Text
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->attr('type', 'password');
  }

  /** 
   * Returns this and child HTML tags.
   * 
   * @return string a self tag and including internal tags.
   */     
  protected function _element()
  {
    return \DomBuilder\Element\Input::_element();
  }
}