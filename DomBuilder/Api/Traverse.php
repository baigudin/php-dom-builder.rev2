<?php
/**
 * Elements tree traversal access declaration.  
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Api;

interface Traverse extends Object
{  
  /** 
   * Returns root element of each element.
   * 
   * The method returns a root element of each element by traversing all parent elements starting from this.
   *
   * @return Element root elements.
   */
  public function root();  
  
  /**
   * Returns previous elements.
   *
   * The method returns a collection of previous elements that contains a previous element of each element 
   * if that element is existed or returns NULL value if no previous elements is found.
   *
   * @return Element|null previous elements.
   */  
  public function prev();
  
  /**
   * Returns next elements.
   *
   * The method returns a collection of next elements that contains a next element of each element 
   * if that element is existed or returns NULL value if no next elements is found.   
   *
   * @return Element|null next elements.
   */  
  public function next();
  
  /**
   * Returns child elements.
   *
   * The method returns a collection of child elements that depends on given sequence number 
   * and contains a child element of each element if that element is existed 
   * or returns NULL value if no child elements is found.
   *
   * @param int $number a sequence number of child elements.
   * @return Element|null child elements.
   */  
  public function child($number=0);
  
  /**
   * Returns last child elements.
   *
   * The method returns a collection of last child elements that contains a last child element of each element 
   * if that element is existed or returns NULL value if no last child elements is found.   
   *
   * @return Element|null last child elements.
   */  
  public function last();

  /**
   * Returns parent elements.
   *
   * The method returns a collection of parent elements that contains a parent element of each element 
   * if that element is existed or returns NULL value if no parent elements is found.   
   *
   * @return Element|null parent elements.
   */  
  public function parent();
  
  /**
   * Returns children of each element.
   *
   * @return Element child elements of each element.
   */
  public function children();
}