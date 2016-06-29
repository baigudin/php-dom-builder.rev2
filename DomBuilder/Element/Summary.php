<?php
/** 
 * summary – summary, caption, or legend for a details control.
 *
 * The summary element represents a summary, caption, or legend for a details element.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/summary.html
 */
namespace DomBuilder\Element; 

class Summary extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('summary');
  }
}