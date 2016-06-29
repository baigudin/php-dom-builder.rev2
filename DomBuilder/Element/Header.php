<?php
/** 
 * header – header.
 *
 * The header element represents the header of a section.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.com/license/
 * @link      http://baigudin.com
 * @see       https://www.w3.org/TR/html-markup/header.html 
 */
namespace DomBuilder\Element; 

class Header extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('header');
  }
}