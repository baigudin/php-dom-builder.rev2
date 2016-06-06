<?php
/** 
 * img – image.
 *
 * The img element represents an image.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/img.html 
 */
namespace DomBuilder\Element; 

class Img extends \DomBuilder\ElementNode\TagSingle
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('img')->alt('')->src('');
  }

  /** 
   * Returns or sets a value of 'src' attribute.
   *
   * @param string $value value of attribute. 
   * @return string|ElementNode a current value or this element. 
   */     
  public function src($value=NULL)
  {
    return $this->attr('src', $value);
  }  
  
  /** 
   * Returns or sets a value of 'alt' attribute.
   *
   * @param string $value value of attribute. 
   * @return string|ElementNode a current value or this element.
   */   
  public function alt($value=NULL)
  {
    return $this->attr('alt', $value);
  }    
}