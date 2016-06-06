<?php
/** 
 * s – struck text.
 *
 * The s element represents contents that are no longer accurate or no longer relevant 
 * and that therefore has been “struck” from the document.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/s.html
 */
namespace DomBuilder\Element; 

class S extends \DomBuilder\ElementNode\TagDoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('s');
  } 
}