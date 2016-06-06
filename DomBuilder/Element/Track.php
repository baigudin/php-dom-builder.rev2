<?php
/** 
 * track – supplementary media track.
 *
 * The track element enables supplementary media tracks such as subtitle tracks 
 * and caption tracks to be specified for audio and video elements.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/track.html
 */
namespace DomBuilder\Element; 

class Track extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('track');
  } 
}