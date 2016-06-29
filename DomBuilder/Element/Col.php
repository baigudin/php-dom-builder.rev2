<?php
/** 
 * col – table column.
 *
 * The col element represents one or more columns in the column group represented by its colgroup parent.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/col.html
 */
namespace DomBuilder\Element; 

class Col extends \DomBuilder\Core\Element\Single
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('col');
  } 
}