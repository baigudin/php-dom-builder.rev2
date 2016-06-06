<?php
/** 
 * hgroup – heading group.
 *
 * The hgroup element represents a group of headings.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/hgroup.html 
 */
namespace DomBuilder\Element; 

class Hgroup extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('hgroup');
  }
}