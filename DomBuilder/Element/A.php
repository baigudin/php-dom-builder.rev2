<?php
/** 
 * a – hyperlink.
 *
 * The a element represents a hyperlink.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/a.html
 */
namespace DomBuilder\Element; 

class A extends \DomBuilder\Core\Element\DoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('a');
  }
  
  /** 
   * Returns or sets a value of 'href' attribute.
   *
   * @param string $value attribute value.
   * @return string|A a current value or this element.
   */   
  public function href($value=NULL)
  {
    return $this->attr('href', $value);
  }
}