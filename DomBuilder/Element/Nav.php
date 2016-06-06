<?php
/** 
 * nav – group of navigational links.
 *
 * The nav element represents a section of a document that links to other documents 
 * or to parts within the document itself; that is, a section of navigation links.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/nav.html 
 */
namespace DomBuilder\Element; 

class Nav extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('nav');
  }
}