<?php
/** 
 * input type=hidden – hidden input control.
 *
 * The input element with a type attribute whose value is "hidden" represents a value 
 * that is not intended to be examined or manipulated by the user.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/input.hidden.html
 */
namespace DomBuilder\Element\Input; 

class Hidden extends Text
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->attr('type', 'hidden');
  } 
}