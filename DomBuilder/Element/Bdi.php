<?php
/** 
 * bdi – BiDi isolate.
 *
 * The bdi element represents a span of text that is isolated from its surroundings 
 * for the purposes of bidirectional text formatting.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/bdi.html
 */
namespace DomBuilder\Element; 

class Bdi extends \DomBuilder\Core\Element\DoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('bdi');
  } 
}