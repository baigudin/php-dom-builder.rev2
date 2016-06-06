<?php
/** 
 * br – line break.
 *
 * The br element represents a line break.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/br.html
 */
namespace DomBuilder\Element; 

class Br extends \DomBuilder\ElementNode\TagSingle
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('br');
  } 
}