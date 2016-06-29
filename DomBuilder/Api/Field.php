<?php
/** 
 * Form field elements access declaration.  
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Api;

interface Field  extends Object
{
  /** 
   * Checks this field for errors.
   * 
   * @return Element this element.
   */   
  public function check();

  /** 
   * Sets a default value or returns request value.
   *
   * @param string $value default field value.
   * @param string $lang  language key for given default field value.            
   * @return string|Element a gotten value from request or this element.
   */  
  public function value($value=NULL, $lang=NULL);
  
  /** 
   * Sets a new request value.
   *
   * @param string $value new request value.
   * @return Element this element.   
   */  
  public function setRequest($value=NULL);

  /** 
   * Returns or sets a regular expression for checking.
   * 
   * @param string $value regular expression.
   * @return string|Element a current expression or this element.
   */   
  public function reg($value=NULL);
  
  /** 
   * Returns or sets a flag of necessarily filling field.
   * 
   * @param bool $value filling flag.
   * @return bool|Element a current filling flag or this element.
   */   
  public function fill($value=NULL);
  
  /** 
   * Returns or sets a error flag.
   * 
   * @param bool $value error flag.
   * @return bool|Element a current error flag or this element.     
   */   
  public function error($value=NULL);
  
  /** 
   * Returns or sets a error string.
   * 
   * @param string $value error string.
   * @param string $lang  language key for given string.      
   * @return string|Element a current error string or this element.        
   */   
  public function errorStr($value=NULL, $lang=NULL);

  /** 
   * Returns or sets a field name.
   * 
   * @param string $value field name.
   * @param string $lang  language key for given html string.         
   * @return string|Element a current field name or this element.   
   */   
  public function name($value=NULL, $lang=NULL);
}