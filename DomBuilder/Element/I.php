<?php
/** 
 * i – offset text conventionally styled in italic.
 *
 * The i element represents a span of text offset from its surrounding content without conveying any 
 * extra emphasis or importance, and for which the conventional typographic presentation is italic text; 
 * for example, a taxonomic designation, a technical term, an idiomatic phrase from another language, 
 * a thought, or a ship name.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/i.html 
 */
namespace DomBuilder\Element; 

class I extends \DomBuilder\ElementNode\TagDoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('i');
  } 
}