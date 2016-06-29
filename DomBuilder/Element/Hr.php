<?php
/** 
 * hr – thematic break.
 *
 * The hr element represents a paragraph-level thematic break.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/hr.html 
 */
namespace DomBuilder\Element; 

class Hr extends \DomBuilder\Core\Element\Single
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('hr');
  } 
}