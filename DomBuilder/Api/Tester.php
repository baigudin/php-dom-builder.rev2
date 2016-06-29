<?php
/**
 * Elements properties tester access declaration. 
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Api;

interface Tester
{  
  /**
   * Tests if each element has a given ID value.
   *
   * @param string $id ID value.
   * @return bool true if each element has given ID value.
   */   
  public function isElementsId($id);

  /**
   * Tests if each element has a given tag name.
   *
   * @param string $name tag name.
   * @return bool true if each element has given tag name.   
   */ 
  public function isElementsTagName($name);
  
  /**
   * Tests if each element has a given class name.
   *
   * @param string $name class name.
   * @return bool true if each element has given class name.
   */  
  public function isElementsClassName($name);
  
  /**
   * Tests if each element has a given attribute name and its value.
   *
   * The method returns true if each element has given attribute name and its value equals the given value.
   * If the value argument is defaulted, the method returns true if each element has only given attribute name.
   *
   * @param string $name  attribute name.
   * @param string $value attribute value.
   * @return bool true if each element matches given arguments.
   */   
  public function isElementsAttr($name, $value=NULL);
}