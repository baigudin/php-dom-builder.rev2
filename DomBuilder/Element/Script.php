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

class Script extends \DomBuilder\ElementNode\TagDoubleBlock
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
   * Sets tag as 'text/javascript' type and that value of 'src' attribute.
   *
   * @param string $src given attribute name value.
   * @return ElementNode this element.
   */
  public function typeJavaScript($src)
  {
    if(self::docType() != self::DOC_HTML_5) $this->attr('language', 'JavaScript');
    return $this->javascript()->attr('src', $src);    
  }
  
  /** 
   * Sets a  program source code.
   *
   * @param string $code program source code.
   * @return ElementNode this element.
   */ 
  public function program($code)
  {
    $code = '<!--'.self::LF.$code.self::LF.'-->';
    return $this->html($code);
  }

  /** 
   * Sets tag as 'text/javascript' type.
   *
   * @return ElementNode this element.
   */ 
  public function javascript()
  {
    return $this->attr('type', 'text/javascript');
  }  
}