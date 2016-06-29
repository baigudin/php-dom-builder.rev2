<?php
/** 
 * samp – (sample) output.
 *
 * The samp element represents (sample) output from a program or computing system.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/samp.html
 */
namespace DomBuilder\Element; 

class Samp extends \DomBuilder\Core\Element\DoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('samp');
  } 
}