<?php
/** 
 * dfn – defining instance.
 *
 * The dfn element represents the defining instance of a term.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/dfn.html 
 */
namespace DomBuilder\Element; 

class Dfn extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('dfn');
  } 
}