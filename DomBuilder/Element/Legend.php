<?php
/** 
 * legend – title or explanatory caption.
 *
 * The legend element represents a title or explanatory caption for the rest of the contents 
 * of the legend element’s parent element.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/legend.html 
 */
namespace DomBuilder\Element; 

class Legend extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('legend');
  }
}