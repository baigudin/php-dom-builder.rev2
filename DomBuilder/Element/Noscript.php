<?php
/** 
 * noscript – fallback content for script.
 *
 * The noscript element is used to present different markup to user agents that don’t support scripting, 
 * by affecting how the document is parsed.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/noscript.html 
 */
namespace DomBuilder\Element; 

class Noscript extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('noscript');
  }
}