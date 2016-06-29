<?php
/** 
 * cite – cited title of a work.
 *
 * The cite element represents the cited title of a work; for example, 
 * the title of a book mentioned within the main text flow of a document.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/cite.html
 */
namespace DomBuilder\Element; 

class Cite extends \DomBuilder\Core\Element\DoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('cite');
  } 
}