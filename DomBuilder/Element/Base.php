<?php
/** 
 * base – base URL.
 *
 * The base element specifies a document-wide base URL for the purposes of resolving relative URLs, 
 * and a document-wide default browsing context name for the purposes of following hyperlinks.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/base.html
 */
namespace DomBuilder\Element; 

class Base extends \DomBuilder\ElementNode\TagSingle
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('base');
  } 
}