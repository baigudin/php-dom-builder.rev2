<?php
/** 
 * blockquote – block quotation.
 *
 * The blockquote element represents a section that is quoted from another source.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/blockquote.html
 */
namespace DomBuilder\Element; 

class Blockquote extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('blockquote');
  }
}