<?php
/** 
 * Element container corresponds to double HTML tag. 
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Core\Element; 

abstract class Double extends \DomBuilder\Core\Element
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
  }
  
  /** 
   * Returns open tag.
   * 
   * @return string
   */    
  protected function _tagOpen()
  {  
    return '<'.$this->_tagName().$this->_tagAttr().'>';
  }

  /** 
   * Returns close tag.
   * 
   * @return string
   */    
  protected function _tagClose()
  {  
    return '</'.$this->_tagName().'>';
  }  
}