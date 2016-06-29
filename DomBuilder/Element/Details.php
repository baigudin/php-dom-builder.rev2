<?php
/** 
 * details – control for additional on-demand information.
 *
 * The details element represents a control from which the user can obtain additional information or controls on-demand.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/details.html
 */
namespace DomBuilder\Element; 

class Details extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('details');
  }
}