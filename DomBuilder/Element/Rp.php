<?php
/** 
 * rp – ruby parenthesis.
 *
 * The rp element can be used to provide parentheses around a ruby text component of a ruby annotation, 
 * to be shown by UAs that don’t support ruby annotations.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/rp.html 
 */
namespace DomBuilder\Element; 

class Rp extends \DomBuilder\ElementNode\TagDoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('rp');
  } 
}