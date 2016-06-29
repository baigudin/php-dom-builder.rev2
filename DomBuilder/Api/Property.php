<?php
/**
 * Elements properties access declaration.  
 * 
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Api;

interface Property extends Object
{ 
  /**
   * Returns a HTML tag name.
   *
   * The method returns a tag name of the first element.
   *
   * @return string a tag name.
   */  
  public function tagName();    
  
  /** 
   * Returns or sets a HTML content.
   *
   * The method sets a HTML content for each element, and any contents which were in these elements are replaced 
   * by the new content, or returns HTML content of the first element.
   * Note: If an element has child elements, set content is ignored and method returns HTML marks of child elements.
   *
   * @param string $html new HTML string.
   * @param string $lang language key for given html string.   
   * @return string|Element a current value or this element.   
   */
  public function html($html=NULL, $lang=NULL);  
  
  /** 
   * Returns or sets a text content.
   *
   * Unlike the html method, the method converts HTML special characters of given text string to HTML entities,
   * or returns converted child elements HTML marks. As the html method, text method ignores set text data
   * if an element has child elements.
   *
   * @param string $text new text string.
   * @param string $lang language key for given html string.   
   * @return string|Element a current value or this element.   
   */
  public function text($text=NULL, $lang=NULL);
  
  /**
   * Returns or sets some user data.
   *
   * The method returns a user data of the first element or sets given data for each element.
   *
   * @param mixed  $data any data.
   * @param string $lang language key for given data.      
   * @return mixed|Element a data of the first element or this element.   
   */  
  public function data($data=NULL, $lang=NULL);
  
  /** 
   * Returns or sets an associative string key.
   *
   * The method sets the key for an element or for last added element into an elements list,
   * or returns the key of an element or the key of last added element into an elements list.
   *
   * @param string $key a string key.
   * @return string|Element a key of the last element or this element.
   */
  public function key($key=NULL);
}