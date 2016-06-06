<?php
/** 
 * tbody – table row group.
 *
 * The tbody element represents a block of rows that consist of a body of data for its parent table element.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/tbody.html
 */
namespace DomBuilder\Element; 

class Tbody extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('tbody');
  }
}