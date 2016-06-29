<?php
/** 
 * Condition for Internet Explorer.
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2014 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software 
 */
namespace DomBuilder\Element\Node;

class Ie extends \DomBuilder\Core\Element\DoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('ie');
    $this->_version = '';
  }
  
  /** 
   * Returns or sets Internet Explorer browser version.
   *
   * @param string $value browser version.
   * @return string|Ie — a current value or this element.
   */  
  public function version($value=NULL)
  {
    if( !isset($value) ) return $this->_version;
    $this->_version = $value;
    return $this;
  }
  
  /** 
   * Returns open tag.
   * 
   * @return string
   */    
  protected function _tagOpen()
  {  
    $ver = ( empty($this->_version) ) ? '' : ' '.$this->_version;  
    return '<!--[if IE'.$ver.']>';
  }

  /** 
   * Returns close tag.
   * 
   * @return string
   */    
  protected function _tagClose()
  { 
    $ver = ( empty($this->_version) ) ? '' : ' '.$this->_version;
    return '<![endif IE'.$ver.']-->';
  }
  
  /** 
   * Returns tabulated string.
   *
   * Method adds tabulation characters before every row of the string.
   * And adds a carriage return character to the end of the string.
   * 
   * @param string $str text string.
   * @return string tabulated given string.
   */      
  protected static function _tabulation($str)
  { 
    // Converting 0D0A to 0А
    $str = str_replace(self::CR.self::LF, self::LF, $str);
    // Adding LF to the end if last char does not LF
    if( substr($str, -1 ) != self::LF ) $str.= self::LF;
    // Replacing LF to LF.TB
    $str = str_replace(self::LF, self::LF.self::TB, $str);
    // Deleting last TB
    return substr($str, 0, strlen($str)-strlen(self::TB));
  }   
  
  /**
   * IE version.
   * @var string
   */   
  private $_version;   
}