<?php
/** 
 * aside – tangential content.
 *
 * The aside element represents content that is tangentially related 
 * to the content that forms the main textual flow of a document.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/aside.html
 */
namespace DomBuilder\Element; 

class Aside extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('aside');
  }
}