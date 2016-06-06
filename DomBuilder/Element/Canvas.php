<?php
/** 
 * canvas – canvas for dynamic graphics.
 *
 * The canvas element represents a resolution-dependent bitmap canvas, 
 * which can be used for dynamically rendering of images such as game graphics, graphs, or other images.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/canvas.html
 */
namespace DomBuilder\Element; 

class Canvas extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('canvas');
  }
}