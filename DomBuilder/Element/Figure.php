<?php
/** 
 * figure – figure with optional caption.
 *
 * The figure element represents a unit of content, optionally with a caption, that is self-contained, 
 * that is typically referenced as a single unit from the main flow of the document, 
 * and that can be moved away from the main flow of the document without affecting the document’s meaning.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/figure.html 
 */
namespace DomBuilder\Element; 

class Figure extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('figure');
  }
}