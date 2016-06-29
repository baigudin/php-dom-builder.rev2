<?php
/** 
 * optgroup – group of options.
 *
 * The optgroup element represents a group of option elements with a common label.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/optgroup.html 
 */
namespace DomBuilder\Element; 

class Optgroup extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('optgroup');
  }
}