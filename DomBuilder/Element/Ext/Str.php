<?php
/** 
 * ext\str - internal tag string.
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Element\Ext;

class Str extends \DomBuilder\ElementNode\TagDoubleInline
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
  protected function _tag()
  {  
    return $this->_text();
  }
}