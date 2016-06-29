<?php
/** 
 * rt – ruby text.
 *
 * The rt element marks the ruby text component of a ruby annotation.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/rt.html
 */
namespace DomBuilder\Element; 

class Rt extends \DomBuilder\Core\Element\DoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('rt');
  } 
}