<?php
/**
 * Elements common access declaration. 
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Api;

interface Object
{ 
  /**
   * Returns the number of elements.
   *
   * The method has to return a number of contained elements.
   * For singular element container it has to return 1 and
   * for elements list container it has to return a count of elements into it.
   *
   * @return int the number of elements.
   */  
  public function length();  
}