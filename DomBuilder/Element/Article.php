<?php
/** 
 * article – article.
 *
 * The article element represents a section of content that forms an independent part of 
 * a document or site; for example, a magazine or newspaper article, or a blog entry.
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/article.html
 */
namespace DomBuilder\Element; 

class Article extends \DomBuilder\ElementNode\TagDoubleBlock
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->_tagName('article');
  }
}