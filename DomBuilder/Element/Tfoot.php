<?php
/** 
 * tfoot – table footer row group.
 *
 * The tfoot element represents the block of rows that consist of the column summaries (footers) 
 * for its parent table element.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/tfoot.html
 */
namespace DomBuilder\Element; 

class Tfoot extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('tfoot');
  }
}