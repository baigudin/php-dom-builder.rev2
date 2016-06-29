<?php
/** 
 * Element container corresponds to HTML tags of web form fields. 
 *
 * @author    Sergey Baigudin, baigudin@mail.ru
 * @copyright 2012-2016 Sergey Baigudin
 * @license   http://baigudin.software/license/
 * @link      http://baigudin.software
 */
namespace DomBuilder\Core\Element; 

abstract class Field extends \DomBuilder\Core\Element implements \DomBuilder\Api\Field
{
  /** 
   * Constructor.
   */
  function __construct()
  {
    parent::__construct();    
    $this->_fill = false;
    $this->_reg = '';
    $this->_error = false;
    $this->_errorStr = array('');
    $this->_name = array('');
    $this->_value = array(false);
    $this->_tagNum = self::$_countTags++;                
  }
  
  /** 
   * Checks this field for errors.
   * 
   * @return ElementNode this element.
   */   
  public abstract function check();

  /** 
   * Sets a default value or returns request value.
   *
   * @param string $value default field value.
   * @param string $lang  language key for given html string.            
   * @return string|ElementNode a current value or this element.   
   */  
  public function value($value=NULL, $lang=NULL)
  {
    // Set user value as default value
    if( isset($value) ) return $this->_value($value, $lang);
    // Return value form request if it exists
    return $this->_getRequest();
  }
  
  /** 
   * Sets a new request value.
   *
   * @param string $value new request value.
   * @return ElementNode this element.   
   */  
  public function setRequest($value=NULL)
  {
    $name = $this->attr('name');
    if( empty($name) ) return $this;
    $_REQUEST[$name] = $value;
    return $this;
  }   

  /** 
   * Returns or sets a regular expression.
   * 
   * @param string $value regular expression.
   * @return string|ElementNode a current value or this element.
   */   
  public function reg($value=NULL)
  {
    if( !isset($value) ) return $this->_reg;
    $this->_reg = $value;
    return $this;
  }
  
  /** 
   * Returns or sets a fill flag.
   * 
   * @param bool $value fill flag.
   * @return bool|ElementNode a current value or this element.   
   */   
  public function fill($value=NULL)
  {
    if( !isset($value) ) return $this->_fill;
    $this->_fill = $value;
    return $this; 
  }  
  
  /** 
   * Returns or sets a error flag.
   * 
   * @param bool $value error flag.
   * @return bool|ElementNode a current value or this element.     
   */   
  public function error($value=NULL)
  {
    if( !isset($value) ) return $this->_error;
    $this->_error = $value;
    return $this;
  }
  
  /** 
   * Returns or sets a error string.
   * 
   * @param string $value error string.
   * @param string $lang  language key for given string.      
   * @return bool|ElementNode a current value or this element.        
   */   
  public function errorStr($value=NULL, $lang=NULL)
  {
    return $this->_langVariable($this->_errorStr, $value, $lang);    
  }

  /** 
   * Returns or sets a field name.
   * 
   * @param string $value field name.
   * @param string $lang  language key for given html string.         
   * @return string|ElementNode a current value or this element.   
   */   
  public function name($value=NULL, $lang=NULL)
  {
    return $this->_langVariable($this->_name, $value, $lang);
  }
  
  /** 
   * Returns content of double tag.
   * 
   * @return string
   */   
  protected final function _text()
  { 
    $html = $this->html();  
    if( strlen($html) == 0 ) return '';  
    if( parent::docCompress() == true ) return $html;
    if( $this->_tagType() == self::TAG_DOUBLE_INLINE ) return $html;
    return self::_tabulation($html);
  }
  
  /** 
   * Returns open tag.
   * 
   * @return string
   */    
  protected function _tagOpen()
  {  
    return '<'.$this->_tagName().$this->_tagAttr().'>';
  }

  /** 
   * Returns close tag.
   * 
   * @return string
   */    
  protected function _tagClose()
  {  
    return '</'.$this->_tagName().'>';
  }
  
  /** 
   * Returns a request value.
   *
   * Methods returns a valuue gotten by POST/GET request.
   *
   * @return string|false a request value.
   */
  protected function _getRequest()
  {
    $name = $this->attr('name');
    if( empty($name) || !isset($_REQUEST[$name]) ) return false;
    return trim($_REQUEST[$name]);      
  } 

  /** 
   * Returnss a default value.
   *
   * @param string $value default field value.
   * @param string $lang  language key for given html string.            
   * @return string|ElementNode|false a current value or this element.    
   */  
  protected function _value($value=NULL, $lang=NULL)
  {
    return $this->_langVariable($this->_value, $value, $lang);
  }  
  
  /** 
   * Returns HTML tag number.
   * 
   * @return int
   */   
  protected function _tagNum()
  {
    return $this->_tagNum;
  }
  
  /** 
   * Returns a language phrases.
   * 
   * @param string $str
   * @return string
   */  
  protected static function _lang($str)
  {
    switch( self::docLanguage() )
    {
      case 'en':
      {
        switch($str)
        {
          case 'Не заполнено': return 'Field is empty';     
          case 'Значение не передано': return 'Field value is not given';
          case 'Содержит недопустимое количество символов': return 'Field value is exceeded characters limit';
          case 'Содержит недопустимые символы': return 'Field contains illegal characters';
          case 'Содержит недопустимые значение': return 'Field contains illegal value';
          case 'Неустановленный тип поля': return 'Feild type is unknown';
          case 'Размер файла больше допустимого': return 'File size is greater than allowable';
          case 'Размер файла меньше допустимого': return 'File size is less than allowable';
          case 'Размер принятого файла превысил максимально допустимый размер': return 'Uploaded file size is greater than allowable';
          case 'Размер загружаемого файла превысил максимальное значение формы': return 'Uploaded file size is greater than form allows';
          case 'Загружаемый файл был получен только частично': return 'Uploaded file is received partly';
          case 'Файл не был загружен': return 'File is not upload';
          case 'Флаг не установлен': return 'Checkbox is not set';
          case 'Переключатель не установлен': return 'Switching is not set';          
        }
      }
      break;
    }
    return $str;
  }
  
  /**
   * Flag that field must be filling.
   * @var bool
   */   
  private $_fill;
  
  /**
   * Regular expression for checking the field.
   * @var string
   */   
  private $_reg;  
  
  /**
   * Flag that field has a filling error.
   * @var bool
   */
  private $_error;    
  
  /** 
   * Field error string.
   * @var string[]
   */  
  private $_errorStr;
  
  /** 
   * Field name.
   * @var array
   */  
  private $_name;  
  
  /** 
   * Field default value.
   * @var array
   */    
  private $_value;
  
  /**
   * HTML tag number
   * @var int
   */     
  private $_tagNum;   
  
  /**
   * Fields counter.   
   * @var int
   */   
  private static $_countTags = 0;      
}