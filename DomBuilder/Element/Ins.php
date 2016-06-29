<?php
/** 
 * ins – inserted text.
 *
 * The ins element represents a range of text that has been inserted (added) to a document.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/ins.html 
 */
namespace DomBuilder\Element; 

class Ins extends \DomBuilder\Core\Element\DoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('ins');
  } 
}