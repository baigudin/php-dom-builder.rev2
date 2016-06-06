<?php
/** 
 * html – root element.
 *
 * The html element represents the root of a document.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/html.html 
 */
namespace DomBuilder\Element; 

class Html extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $lang = self::docLanguage();
    $this->_tagName('html');
    switch(self::docType())
    {
      case self::DOC_XHTML_10: $this->attr('xmlns', 'http://www.w3.org/1999/xhtml')->attr('xml:lang', $lang); break;
      case self::DOC_HTML_401: break;
      case self::DOC_HTML_5: $this->attr('xml:lang', $lang); break;
    }        
    $this->attr('lang', $lang);
  }
}