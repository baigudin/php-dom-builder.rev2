<?php
/** 
 * script – embedded script.
 *
 * The script element enables dynamic script and data blocks to be included in documents.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/script.html
 */
namespace DomBuilder\Element; 

class Script extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('script');
  }

  /** 
   * Sets this element as 'text/javascript' type.
   *
   * @param string $src a value of 'src' attribute.
   * @return Script this element.
   */ 
  public function javascript($src=NULL)
  {
    $this->attr('type', 'text/javascript');
    if( !isset($src) ) return $this;
    if(self::docType() != self::DOC_HTML_5) $this->attr('language', 'JavaScript');
    return $this->attr('src', $src);     
  }  
  
  /** 
   * Sets a program source code.
   *
   * @param string $code program source code.
   * @return Script this element.
   */ 
  public function program($code)
  {
    $code = '<!--'.self::LF.$code.self::LF.'-->';
    return $this->html($code);
  }
}