<?php
/** 
 * var – variable or placeholder text.
 *
 * The var element represents either a variable in a mathematical expression or programming context, 
 * or placeholder text that the reader is meant to mentally replace with some other literal value.
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/var.html
 */
namespace DomBuilder\Element; 

class Variable extends \DomBuilder\Core\Element\DoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('var');
  } 
}