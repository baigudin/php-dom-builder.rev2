<?php
/** 
 * thead – table heading group.
 *
 * The thead element represents the block of rows that consist of the column labels (headings) 
 * for its parent table element.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/thead.html
 */
namespace DomBuilder\Element; 

class Thead extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('thead');
  }
}