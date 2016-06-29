<?php
/** 
 * Text string element.
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Element\Node;

class Text extends \DomBuilder\Core\Element\DoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('str');
  }
 
  /** 
   * Returns string.
   * 
   * @return string
   */  
  protected function _element()
  {  
    return $this->_text();
  }
}