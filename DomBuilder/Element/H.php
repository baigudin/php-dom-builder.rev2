<?php
/** 
 * heading.
 *
 * The h1 through h6 elements are headings for the sections with which they are associated.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Element; 

class H extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   *
   * @param int $level heading level.   
   */
  function __construct($level=NULL)
  {
    parent::__construct();
    if(!isset($level)) $level = 6;
    $this->level($level);
  }  
  
  /** 
   * Returns or sets heading level.
   * 
   * @param int $level heading level.
   * @return int|ElementNode current heading level or this element.
   */
  public function level($level=NULL)
  {
    if( !isset($level) ) return $this->_level;
    if( 1 <= $level && $level<=6 ) 
    {
      $this->_level = $level;      
      $this->_tagName( sprintf('h%s', $this->_level) );
    }
    return $this;
  }

  /**
   * Heading level.
   * @var int
   */  
  private $_level;
}