<?php
/** 
 * param – initialization parameters for plugins.
 *
 * The param element defines parameters for plugins invoked by object elements.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/param.html 
 */
namespace DomBuilder\Element;

class Param extends \DomBuilder\ElementNode\TagSingle
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('param');
  } 
}