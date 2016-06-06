<?php
/** 
 * keygen – key-pair generator/input control.
 *
 * The keygen element represents a control for generating a public-private key pair 
 * and for submitting the public key from that key pair.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/keygen.html 
 */
namespace DomBuilder\Element; 

class Keygen extends \DomBuilder\ElementNode\TagDoubleInline
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('keygen');
  } 
}