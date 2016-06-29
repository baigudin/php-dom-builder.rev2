<?php
/** 
 * input type=file – file upload control.
 *
 * The input element with a type attribute whose value is "file" represents a list of file items, 
 * each consisting of a file name, a file type, and a file body (the contents of the file).
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 * @see       https://www.w3.org/TR/html-markup/input.file.html
 */
namespace DomBuilder\Element\Input; 

class File extends \DomBuilder\Element\Input
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();
    $this->attr('type', 'file');
    $this->_file = new \StdClass();
    $this->_file->name = '';
    $this->_file->path = '';    
    $this->_file->type = '';
    $this->_file->size = 0;    
    $this->_file->maxSize = 0;
    $this->_file->minSize = 0;    
  } 
  

  /** 
   * Checks field for errors.
   * 
   * @return File this element.
   */
  public function check()
  {
    $name = $this->attr('name');
    if( !isset($_FILES[$name]) ) return $this->error(false);
    switch($_FILES[$name]['error'])
    {
      case 0:
      {
        if( $_FILES[$name]['size'] > $this->_file->maxSize )
          return $this->error(true)->errorStr(self::_lang('Размер файла больше допустимого'));
        else if( $_FILES[$name]['size'] < $this->_file->minSize )
          return $this->error(true)->errorStr(self::_lang('Размер файла меньше допустимого'));
        else
        {
          $this->_file->name = $_FILES[$name]['name'];
          $this->_file->path = $_FILES[$name]['tmp_name'];                          
          $this->_file->type = $_FILES[$name]['type'];
          $this->_file->size = $_FILES[$name]['size'];              
          return $this->error(false);                    
        }
      }
      break;
      case 1: return $this->error(true)->errorStr(self::_lang('Размер принятого файла превысил максимально допустимый размер'));
      case 2: return $this->error(true)->errorStr(self::_lang('Размер загружаемого файла превысил максимальное значение формы'));
      case 3: return $this->error(true)->errorStr(self::_lang('Загружаемый файл был получен только частично'));
      case 4: 
      {
        if( $this->fill()===false ) return $this->error(false); 
        else return $this->error(true)->errorStr(self::_lang('Файл не был загружен'));
      }
    }
    return $this->error(true);
  }
  
  /** 
   * Returns unchecked uploaded file information.
   *
   * The method returns uploaded file information in StdClass object which contains a name, path, type, and size fields.
   *
   * @param mixed  $value always should be NULL.
   * @param string $lang  always should be NULL.
   * @return \StdClass file information.
   */   
  public function value($value=NULL, $lang=NULL)
  {
    if( isset($value) ) return $this;
    $name = $this->attr('name');
    if( empty($name) || !isset($_FILES[$name]) ) return false;
    $file = new \StdClass();
    $file->name = isset($_FILES[$name]['name']) ? $_FILES[$name]['name'] : '';
    $file->path = isset($_FILES[$name]['tmp_name']) ? $_FILES[$name]['tmp_name'] : '';
    $file->type = isset($_FILES[$name]['type']) ? $_FILES[$name]['type'] : '';
    $file->size = isset($_FILES[$name]['size']) ? $_FILES[$name]['size'] : 0;
    return $file;
  }

  /** 
   * Returns checked uploaded file information.
   *
   * Method returns a file information which gets after checking.
   *
   * @return \StdClass file information.
   */  
  public function file()
  {
    return $this->_file;
  }    
  
  /** 
   * Sets an available rage for file size.
   * 
   * @param int $min minimum size in byte.
   * @param int $max maximum size in byte.
   * @return File this element.   
   */    
  public function fileSize($min, $max)
  {
    return $this->fileMinSize($min)->fileMaxSize($max);
  }  

  /** 
   * Returns or sets available maximum rage size for file size.
   * 
   * @param int $size maximum size in byte.
   * @return int|File a current value or this element.   
   */ 
  public function fileMaxSize($size=NULL)
  {
    if( !isset($size) ) return $this->_file->maxSize;
    $this->_file->maxSize = $size;  
    return $this;
  }  
  
  /** 
   * Returns or sets available minimum rage size for file size.
   * 
   * @param int $size minimum size in byte.
   * @return int|File a current value or this element.   
   */
  public function fileMinSize($size=NULL)
  {
    if( !isset($size) ) return $this->_file->minSize;
    $this->_file->minSize = $size;  
    return $this;
  }   
  
  /** 
   * Settings for uploading file.
   * @var StdClass
   */    
  private $_file;    
}