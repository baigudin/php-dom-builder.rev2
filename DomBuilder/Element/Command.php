<?php
/** 
 * command – command.
 *
 * The command element is a multipurpose element for representing commands.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/command.html
 */
namespace DomBuilder\Element; 

class Command extends \DomBuilder\Core\Element\Single
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('command');
  } 
}