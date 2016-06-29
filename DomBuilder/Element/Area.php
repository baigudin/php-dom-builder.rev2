<?php
/** 
 * area – image-map hyperlink.
 *
 * The area element represents either a hyperlink with some text and a corresponding area on an image map, 
 * or a dead area on an image map.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/area.html
 */
namespace DomBuilder\Element; 

class Area extends \DomBuilder\Core\Element\Single
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('area');
  }
}