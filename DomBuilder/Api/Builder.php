<?php
/**
 * Elements tree builder access declaration. 
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Api;

interface Builder extends Object
{
  /** 
   * Inserts an element as the last child of each element.
   *
   * @param string|Element $node a string that contains a tag name of new element or an element.
   * @return Element|false new inserted element.
   */  
  public function insert($node);
  
  /** 
   * Inserts an element as the first child of each element.   
   *
   * @param string|Element $node a string that contains a tag name of new element or an element.
   * @return Element|false new inserted element.
   */  
  public function prepend($node);
  
  /** 
   * Inserts an element after each element.
   *   
   * @param string|Element $node a string that contains a tag name of new element or an element.
   * @return Element|false new inserted element.
   */  
  public function after($node);
  
  /** 
   * Inserts an element before each element.
   *   
   * @param string|Element $node a string that contains a tag name of new element or an element.
   * @return Element|false new inserted element.
   */   
  public function before($node);
  
  /** 
   * Removes each element.
   * 
   * @return Element removed elements.
   */   
  public function remove();
}