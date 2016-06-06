<?php
/** 
 * form – user-submittable form.
 *
 * The form element represents a user-submittable form.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/form.html 
 */
namespace DomBuilder\Element; 

class Form extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('form');
  }
  
  /** 
   * Returns or sets a value of 'method' attribute.
   *
   * @param string $value value of attribute. 
   * @return string|Tag a current value or this node.
   */   
  public function method($value=NULL)
  {
    return $this->attr('method', $value);
  }
  
  
  /** 
   * Returns or sets a value of 'action' attribute.
   *
   * @param string $value value of attribute. 
   * @return string|Tag a current value or this node.
   */   
  public function action($value=NULL)
  {
    if( !isset($value) ) return $this->attr('action');
    if( self::docType() == self::DOC_HTML_5 && empty($value) ) return $this;
    return $this->attr('action', $value);
  }
  
  /** 
   * Returns or sets a value of 'enctype' attribute.
   *
   * @param string $value value of attribute. 
   * @return string|Tag a current value or this node.
   */   
  public function enctype($value=NULL)
  {
    if( isset($value) ) return $this->attr('enctype', $value);
    return $this->attr('enctype');
  }    
}