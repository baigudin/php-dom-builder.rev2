<?php
/** 
 * input type=image – image-coordinates input control.
 *
 * The input element with a type attribute whose value is "image" represents either 
 * an image from which the UA enables a user to interactively select a pair of coordinates 
 * and submit the form, or alternatively a button from which the user can submit the form.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/input.image.html
 */
namespace DomBuilder\Element\Input; 

class Image extends \DomBuilder\Element\Input
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->attr('type', 'image');
  }
  
  /** 
   * Checks this field for errors.
   * 
   * @return ElementNode this element.
   */   
  public function check()
  {
    return $this->error(false);
  }    
}