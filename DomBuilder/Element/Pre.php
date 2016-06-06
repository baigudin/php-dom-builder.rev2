<?php
/** 
 * pre – preformatted text.
 *
 * The pre element represents a block of preformatted text, 
 * in which structure is represented by typographic conventions rather than by elements.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/pre.html 
 */
namespace DomBuilder\Element; 

class Pre extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('pre');
  }
}