<?php
/** 
 * Root element container.  
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Core\Element; 

class Root extends \DomBuilder\Core\Element
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
  }
  
  /** 
   * Returns this HTML element with its HTML content.
   * 
   * @return string this element with child elements.
   */
  protected function _element()
  {
    return $this->html();
  }
}