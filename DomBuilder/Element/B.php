<?php
/** 
 * b – offset text conventionally styled in bold.
 *
 * The b element represents a span of text offset from its surrounding content without conveying any 
 * extra emphasis or importance, and for which the conventional typographic presentation is bold text; 
 * for example, keywords in a document abstract, or product names in a review.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/b.html
 */
namespace DomBuilder\Element; 

class B extends \DomBuilder\Core\Element\DoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('b');
  }
}