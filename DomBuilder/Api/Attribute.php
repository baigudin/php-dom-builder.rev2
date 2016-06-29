<?php
/**
 * Elements attributes access declaration.
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Api;
 
interface Attribute extends Object
{  
  /** 
   * Adds new class attribute value.
   *
   * The method sets new value for class attribute of each element.
   * If class attribute is set, the method adds new value of attribute.
   *
   * @param string $value new class attribute value.
   * @return Element this element.
   */   
  public function addClass($value);
  
  /** 
   * Removes class attribute value.
   *
   * @param string $value class attribute value.
   * @return Element this element.
   */   
  public function removeClass($value);
  
  /** 
   * Returns an attribute value or sets attributes and its values.
   *
   * The method returns an attribute value of the first element or
   * sets new value of given attribute name for each element.
   * If given attribute is already set, the method sets new given value of the attribute.
   *
   * @param string|array $name  string with attribute name or array where 
   *                            key is attribute name and value is attribute value.
   * @param string       $value given attribute name value. 
   *                            If first argument is given as array type, 
   *                            this field is skipped.
   * @return string|Element a current attribute value or this element.      
   */   
  public function attr($name, $value=NULL);
  
  /** 
   * Adds a new value to an attribute.
   *
   * The method adds a new value to an attribute of each element.
   * If given attribute is already set, the method adds a new value of this attribute.
   *
   * @param string|array $name  string with attribute name or array where 
   *                            key is attribute name and value is attribute value.
   * @param string       $value given attribute name value. 
   *                            if first argument is given as array type, 
   *                            this field is be skipped.
   * @return Element this element.
   */  
  public function addAttr($name, $value=NULL);
  
  /** 
   * Removes attribute of each element.
   *
   * @param string|array $name string with attribute name or array of attribute names. 
   * @return Element this element.
   */    
  public function removeAttr($name);  
}