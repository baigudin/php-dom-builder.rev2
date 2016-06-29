<?php
/** 
 * Noindex element.
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software 
 */
namespace DomBuilder\Element\Node;

class Noindex extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('noindex');
  }
  
  /** 
   * Returns open tag.
   * 
   * @return string
   */    
  protected function _tagOpen()
  {  
    return '<!--'.$this->_tagName().'-->';
  }

  /** 
   * Returns close tag.
   * 
   * @return string
   */    
  protected function _tagClose()
  {  
    return '<!--/'.$this->_tagName().'-->';
  }   
}