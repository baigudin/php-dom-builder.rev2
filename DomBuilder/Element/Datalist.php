<?php
/** 
 * datalist – predefined options for other controls.
 *
 * The datalist element represents a set of option elements that represent predefined options for other controls.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/datalist.html
 */
namespace DomBuilder\Element; 

class Datalist extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('datalist');
  }
}