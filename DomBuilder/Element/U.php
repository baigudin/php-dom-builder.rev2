<?php
/** 
 * u – offset text conventionally styled with an underline.
 *
 * The u element represents a span of text offset from its surrounding content without conveying 
 * any extra emphasis or importance, and for which the conventional typographic presentation is underlining; 
 * for example, a span of text in Chinese that is a proper name (a Chinese proper name mark), 
 * or span of text that is known to be misspelled.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/u.html
 */
namespace DomBuilder\Element; 

class U extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('u');
  } 
}