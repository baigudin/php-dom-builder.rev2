<?php
/** 
 * meter – scalar gauge.
 *
 * The meter element represents a scalar gauge providing a measurement within a known range, or a fractional value.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/meter.html 
 */
namespace DomBuilder\Element; 

class Meter extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('meter');
  }
}