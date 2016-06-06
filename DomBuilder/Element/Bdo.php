<?php
/** 
 * bdo – BiDi override.
 *
 * The bdo element represents an explicit text directionality formatting control for its children; 
 * it provides a means to specify a direction override of the Unicode BiDi algorithm.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/bdo.html
 */
namespace DomBuilder\Element; 

class Bdo extends \DomBuilder\ElementNode\TagDoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('bdo');
  } 
}