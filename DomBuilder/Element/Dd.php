<?php
/** 
 * dd – description or value.
 *
 * The dd element represents a description or value.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/dd.html
 */
namespace DomBuilder\Element; 

class Dd extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('dd');
  } 
}