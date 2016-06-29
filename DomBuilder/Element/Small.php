<?php
/** 
 * small – small print.
 *
 * The small element represents so-called “fine print” or “small print”, such as legal disclaimers and caveats.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/small.html
 */
namespace DomBuilder\Element; 

class Small extends \DomBuilder\Core\Element\DoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('small');
  } 
}