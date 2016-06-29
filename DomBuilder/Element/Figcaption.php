<?php
/** 
 * figcaption – figure caption.
 *
 * The figcaption element represents a caption or legend for a figure.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/figcaption.html 
 */
namespace DomBuilder\Element; 

class Figcaption extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('figcaption');
  }
}