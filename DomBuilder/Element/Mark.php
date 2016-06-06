<?php
/** 
 * mark – marked (highlighted) text.
 *
 * The mark element represents a run of text in one document marked or highlighted for reference purposes, 
 * due to its relevance in another context.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/mark.html 
 */
namespace DomBuilder\Element; 

class Mark extends \DomBuilder\ElementNode\TagDoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('mark');
  } 
}