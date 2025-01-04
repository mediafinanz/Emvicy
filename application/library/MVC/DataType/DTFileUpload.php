<?php
/**
 * DTFileUpload.php
 * @package   Emvicy
 * @copyright ueffing.net
 * @author    Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license   GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */
# 2024-05-23 14:30:09

/**
 * @name $MVCDataType
 */
namespace MVC\DataType;

use MVC\MVCTrait\TraitDataType;

class DTFileUpload
{
    use TraitDataType;

    public const DTHASH = 'ac6f5c674693dbefa6a3b7c14b74cbd8';

    /**
     * @required true
     * @var array
     */
    protected $name;

    /**
     * @required true
     * @var array
     */
    protected $full_path;

    /**
     * @required true
     * @var array
     */
    protected $type;

    /**
     * @required true
     * @var array
     */
    protected $tmp_name;

    /**
     * @required true
     * @var array
     */
    protected $error;

    /**
     * @required true
     * @var array
     */
    protected $size;

    /**
     * DTFileUpload constructor.
     * @param DTValue $oDTValue
     * @throws \ReflectionException
     */
    protected function __construct(DTValue $oDTValue)
    {
        \MVC\Event::run('DTFileUpload.__construct.before', $oDTValue);
        $aData = $oDTValue->get_mValue();

        $this->name = array();
        $this->full_path = array();
        $this->type = array();
        $this->tmp_name = array();
        $this->error = array();
        $this->size = array();
        $this->setProperties($oDTValue);

        $oDTValue = DTValue::create()->set_mValue($aData);
        \MVC\Event::run('DTFileUpload.__construct.after', $oDTValue);
    }

    /**
     * @param array|null $aData
     * @return DTFileUpload
     * @throws \ReflectionException
     */
    public static function create(?array $aData = array())
    {
        (null === $aData) ? $aData = array() : false;
        $oDTValue = DTValue::create()->set_mValue($aData);
        \MVC\Event::run('DTFileUpload.create.before', $oDTValue);
        $oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::run('DTFileUpload.create.after', $oDTValue);

        return $oDTValue->get_mValue();
    }

    /**
     * @param array  $mValue
     * @return $this
     * @throws \ReflectionException
     */
    public function set_name(array $mValue)
    {
        $oDTValue = DTValue::create()->set_mValue($mValue);

        $this->name = $mValue;

        return $this;
    }

    /**
     * @param array $mValue
     * @return $this
     */
    public function add_name(array $mValue)
    {
        $this->name[] = $mValue;

        return $this;
    }

    /**
     * @param array  $mValue
     * @return $this
     * @throws \ReflectionException
     */
    public function set_full_path(array $mValue)
    {
        $oDTValue = DTValue::create()->set_mValue($mValue);

        $this->full_path = $mValue;

        return $this;
    }

    /**
     * @param array $mValue
     * @return $this
     */
    public function add_full_path(array $mValue)
    {
        $this->full_path[] = $mValue;

        return $this;
    }

    /**
     * @param array  $mValue
     * @return $this
     * @throws \ReflectionException
     */
    public function set_type(array $mValue)
    {
        $oDTValue = DTValue::create()->set_mValue($mValue);

        $this->type = $mValue;

        return $this;
    }

    /**
     * @param array $mValue
     * @return $this
     */
    public function add_type(array $mValue)
    {
        $this->type[] = $mValue;

        return $this;
    }

    /**
     * @param array  $mValue
     * @return $this
     * @throws \ReflectionException
     */
    public function set_tmp_name(array $mValue)
    {
        $oDTValue = DTValue::create()->set_mValue($mValue);

        $this->tmp_name = $mValue;

        return $this;
    }

    /**
     * @param array $mValue
     * @return $this
     */
    public function add_tmp_name(array $mValue)
    {
        $this->tmp_name[] = $mValue;

        return $this;
    }

    /**
     * @param array  $mValue
     * @return $this
     * @throws \ReflectionException
     */
    public function set_error(array $mValue)
    {
        $oDTValue = DTValue::create()->set_mValue($mValue);

        $this->error = $mValue;

        return $this;
    }

    /**
     * @param array $mValue
     * @return $this
     */
    public function add_error(array $mValue)
    {
        $this->error[] = $mValue;

        return $this;
    }

    /**
     * @param array  $mValue
     * @return $this
     * @throws \ReflectionException
     */
    public function set_size(array $mValue)
    {
        $oDTValue = DTValue::create()->set_mValue($mValue);

        $this->size = $mValue;

        return $this;
    }

    /**
     * @param array $mValue
     * @return $this
     */
    public function add_size(array $mValue)
    {
        $this->size[] = $mValue;

        return $this;
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function get_name() : array
    {
        $oDTValue = DTValue::create()->set_mValue($this->name);
        \MVC\Event::run('DTFileUpload.get_name.before', $oDTValue);

        return $oDTValue->get_mValue();
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function get_full_path() : array
    {
        $oDTValue = DTValue::create()->set_mValue($this->full_path);
        \MVC\Event::run('DTFileUpload.get_full_path.before', $oDTValue);

        return $oDTValue->get_mValue();
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function get_type() : array
    {
        $oDTValue = DTValue::create()->set_mValue($this->type);
        \MVC\Event::run('DTFileUpload.get_type.before', $oDTValue);

        return $oDTValue->get_mValue();
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function get_tmp_name() : array
    {
        $oDTValue = DTValue::create()->set_mValue($this->tmp_name);
        \MVC\Event::run('DTFileUpload.get_tmp_name.before', $oDTValue);

        return $oDTValue->get_mValue();
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function get_error() : array
    {
        $oDTValue = DTValue::create()->set_mValue($this->error);
        \MVC\Event::run('DTFileUpload.get_error.before', $oDTValue);

        return $oDTValue->get_mValue();
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function get_size() : array
    {
        $oDTValue = DTValue::create()->set_mValue($this->size);
        \MVC\Event::run('DTFileUpload.get_size.before', $oDTValue);

        return $oDTValue->get_mValue();
    }

    /**
     * @return string
     */
    public static function getPropertyName_name()
    {
        return 'name';
    }

    /**
     * @return string
     */
    public static function getPropertyName_full_path()
    {
        return 'full_path';
    }

    /**
     * @return string
     */
    public static function getPropertyName_type()
    {
        return 'type';
    }

    /**
     * @return string
     */
    public static function getPropertyName_tmp_name()
    {
        return 'tmp_name';
    }

    /**
     * @return string
     */
    public static function getPropertyName_error()
    {
        return 'error';
    }

    /**
     * @return string
     */
    public static function getPropertyName_size()
    {
        return 'size';
    }

    /**
     * @return false|string JSON
     */
    public function __toString()
    {
        return $this->getPropertyJson();
    }

    /**
     * @return false|string
     */
    public function getPropertyJson()
    {
        return json_encode(\MVC\Convert::objectToArray($this));
    }

    /**
     * @return array
     */
    public function getPropertyArray()
    {
        return get_object_vars($this);
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getConstantArray()
    {
        $oReflectionClass = new \ReflectionClass($this);
        $aConstant = $oReflectionClass->getConstants();

        return $aConstant;
    }

    /**
     * @return $this
     */
    public function flushProperties()
    {
        foreach ($this->getPropertyArray() as $sKey => $mValue)
        {
            $sMethod = 'set_' . $sKey;

            if (method_exists($this, $sMethod))
            {
                $this->$sMethod('');
            }
        }

        return $this;
    }

}
