<?php
/** 
 * div – generic flow container.
 *
 * The div element is a generic container for flow content that by itself does not represent anything.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/div.html 
 */
namespace DomBuilder\Element; 

class Div extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('div');
  }
}