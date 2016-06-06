<?php
/** 
 * input type=reset – reset button.
 *
 * The input element with a type attribute whose value is "reset" represents a button for resetting a form.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/input.reset.html
 */
namespace DomBuilder\Element\Input; 

class Reset extends Submit
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->attr('type', 'reset');
  } 
}