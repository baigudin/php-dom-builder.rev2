<?php
/** 
 * colgroup – table column group.
 *
 * The colgroup element represents a group of one or more columns in the table that is its parent.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/colgroup.html
 */
namespace DomBuilder\Element; 

class Colgroup extends \DomBuilder\ElementNode\TagSingle
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('colgroup');
  } 
}