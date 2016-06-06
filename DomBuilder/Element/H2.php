<?php
/** 
 * h2 – heading.
 *
 * The h1 through h6 elements are headings for the sections with which they are associated.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/h2.html 
 */
namespace DomBuilder\Element; 

class H2 extends \DomBuilder\Element\H
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct(2);
  }
}