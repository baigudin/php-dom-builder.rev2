<?php
/** 
 * input type=button – button.
 *
 * The input element with a type attribute whose value is "button" represents a button with no additional semantics.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/input.button.html
 */
namespace DomBuilder\Element\Input; 

class Button extends Submit
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->attr('type', 'button');
  } 
}