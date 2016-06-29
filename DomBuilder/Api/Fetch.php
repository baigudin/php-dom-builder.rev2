<?php
/**
 * Elements fetch by properties access declaration. 
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Api;

interface Fetch extends Object
{  
  /** 
   * Returns an element of elements by index or an array of elements.
   *
   * The method returns an elements array as vector if argument is not given.
   * If argument greater than or equal zero, method returns an element with given index.
   * If argument less than zero, method counts an index from the end of the elements list.
   * For example: [-1] returns the last element, [-2] returns the penultimate element, etc.
   *
   * @param int|string $index element index of this elements or associative string key.   
   * @return Element|Element[]|false an element for integer or string argument, 
   *                                 or an elements array if argument is not given.
   */  
  public function get($index=NULL);

  /**
   * Returns first child element with the specified ID.
   *
   * Note: Any valid HTML documents must have only one tag with unique identifier.
   *
   * @param string $id ID value.
   * @return Element|false searched element.
   */   
  public function getElementById($id);
  
  /**
   * Returns child elements with the specified ID of each element.
   *
   * Note: Any valid HTML documents must have only one tag with unique identifier.
   *
   * @param string $id ID value.
   * @return Element searched result.  
   */  
  public function getElementsById($id);
  
  /**
   * Returns parent elements with the specified ID of each element.
   *
   * Note: Any valid HTML documents must have only one tag with unique identifier.
   *
   * @param string $id ID value.
   * @return Element searched result.
   */   
  public function getParentsById($id);
  
  /**
   * Returns child elements with the specified tag name of each element.
   *
   * @param string $name tag name.
   * @return Element searched result.
   */    
  public function getElementsByTagName($name);
  
  /**
   * Returns parent elements with the specified tag name of each element.
   *
   * @param string $name tag name.
   * @return Element searched result.
   */  
  public function getParentsByTagName($name);
  
  /**
   * Returns child elements with the specified class name of each element.
   *
   * @param string $name class name.
   * @return Element searched result.
   */   
  public function getElementsByClassName($name);
  
  /**
   * Returns parent elements with the specified class name of each element.
   *
   * @param string $name class name.
   * @return Element searched result.
   */   
  public function getParentsByClassName($name);
  
  /**
   * Returns child elements with the specified attribute name and its value of each element.
   *
   * @param string $name  attribute name.
   * @param string $value attribute value.
   * @return Element searched result.
   */  
  public function getElementsByAttr($name, $value=NULL);
  
  /**
   * Returns parent elements with the specified attribute name and its value of each element.
   *
   * @param string $name  attribute name.
   * @param string $value attribute value.
   * @return Element searched result.
   */  
  public function getParentsByAttr($name, $value=NULL);
}