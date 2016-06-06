<?php
/** 
 * span – generic span.
 *
 * The span element is a generic wrapper for phrasing content that by itself does not represent anything.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/span.html
 */
namespace DomBuilder\Element; 

class Span extends \DomBuilder\ElementNode\TagDoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('span');
  }
}