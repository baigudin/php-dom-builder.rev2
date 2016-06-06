<?php
/** 
 * wbr – line-break opportunity.
 *
 * The wbr element represents a line-break opportunity.
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/wbr.html
 */ 
namespace DomBuilder\Element; 

class Wbr extends \DomBuilder\ElementNode\TagSingle
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('wbr');
  } 
}