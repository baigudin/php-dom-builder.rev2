<?php
/**
 * Elements search by query access declaration.  
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Api;

interface Search extends Object
{  
  /**
   * Removes elements for matched elements by the query.
   *
   * The method removes elements by given query.
   * Note: Requested child tags from query string are not processing.
   *
   * @param string|Element $query query string, Element object.
   * @return Element parsed result.
   */
  public function not($query);
  
  /**
   * Filters elements by the query.
   *
   * The method keeps matched elements by the query.
   * Note: Requested child tags from query string are not processing.   
   *
   * @param string $query query string.
   * @return Element filtered result.
   */  
  public function filter($query);
  
  /**
   * Searches parent elements by the query.
   *
   * @param string $query query string.
   * @return Element searched result.
   */    
  public function parents($query);
  
  /**
   * Searches child elements by the query.
   *
   * @param string $query query string.
   * @return Element searched result.
   */   
  public function find($query);
}