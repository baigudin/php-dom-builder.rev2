<?php
/** 
 * option – option.
 *
 * The option element represents an option in a select control, 
 * or an option in a labelled set of options grouped together in an optgroup, 
 * or an option among the list of suggestions in a datalist.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/option.html 
 */
namespace DomBuilder\Element; 

class Option extends \DomBuilder\Core\Element\Double
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('option');
  }
 
  /** 
   * Returns or sets a value of 'value' attribute.
   *
   * @param string $value attribute value.
   * @return string|Option a current value or this element.
   */   
  public function value($value=NULL)
  {
    return $this->attr('value', $value);
  }   
  
  /** 
   * Returns or sets a value of 'label' attribute.
   *
   * @param string $value attribute value.
   * @return string|Option a current value or this element.
   */   
  public function label($value=NULL)
  {
    return $this->attr('label', $value);
  }    
 
  /** 
   * Sets a value of 'selected' attribute.
   *
   * @param bool $value boolean value flag.
   * @return Option this element.
   */  
  public function selected($value=true)
  {
    if( $value == false ) return $this->removeAttr('selected');
    else return $this->attr('selected', 'selected');
  }   

  /** 
   * Sets a value of 'disabled' attribute.
   *
   * @param bool $value boolean value flag.
   * @return Option this element.   
   */  
  public function disabled($value=true)
  {
    if( $value == false ) return $this->removeAttr('disabled');
    else return $this->attr('disabled', 'disabled');
  }   
  
  /** 
   * Returns this and child HTML tags.
   * 
   * @return string a self tag and including internal tags.   
   */   
  protected function _element()
  {  
    $text = $this->_text();  
    $html = $this->_tagOpen();
    $html.= $text;        
    $html.= $this->_tagClose();          
    $html.= self::_lf();        
    return $html;
  } 
  
  /** 
   * Returns content of double tag.
   * 
   * @return string
   */   
  protected final function _text()
  { 
    $html = $this->html();  
    if( strlen($html) != 0 ) return $html;
    if(self::docType() == self::DOC_HTML_5) $this->label(' ');
    return '';  
  }  
}