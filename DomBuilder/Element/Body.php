<?php
/** 
 * body – document body.
 *
 * The body element represents the body of a document (as opposed to the document’s metadata).
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/body.html
 */
namespace DomBuilder\Element; 

class Body extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('body');    
  }
}