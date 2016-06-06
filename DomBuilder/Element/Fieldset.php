<?php
/** 
 * fieldset – set of related form controls.
 *
 * The fieldset element represents a set of form controls grouped under a common name.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/fieldset.html 
 */
namespace DomBuilder\Element; 

class Fieldset extends \DomBuilder\ElementNode\TagDoubleBlock 
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('fieldset');
  }
}