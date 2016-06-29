<?php
/** 
 * map – image-map definition.
 *
 * The map element, in conjunction with any area element descendants, defines an image map.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/map.html 
 */
namespace DomBuilder\Element; 

class Map extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('map');
  }
}