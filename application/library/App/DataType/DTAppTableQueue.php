<?php

namespace App\DataType;

use MVC\DataType\DTValue;
use MVC\MVCTrait\TraitDataType;

class DTAppTableQueue extends \MVC\DB\DataType\DB\TableDataType
{
	use TraitDataType;

	public const DTHASH = '761dee4db479e89edccd6a531f0da9d5';

	/**
	 * @required true
	 * @var string
	 */
	protected $key;

	/**
	 * @required true
	 * @var string|null
	 */
	protected $key2;

	/**
	 * @required true
	 * @var string
	 */
	protected $value;

	/**
	 * @required true
	 * @var string
	 */
	protected $valueMd5;

	/**
	 * @required true
	 * @var int|null
	 */
	protected $expirySeconds;

	/**
	 * @required true
	 * @var int|null
	 */
	protected $expiryStamp;

	/**
	 * @required true
	 * @var string|null
	 */
	protected $description;

	/**
	 * DTAppTableQueue constructor.
	 * @param DTValue $oDTValue
	 * @throws \ReflectionException 
	 */
	protected function __construct(DTValue $oDTValue)
	{
		\MVC\Event::run('DTAppTableQueue.__construct.before', $oDTValue);
		$aData = $oDTValue->get_mValue();

		$this->key = '';
		$this->key2 = null;
		$this->value = '';
		$this->valueMd5 = '';
		$this->expirySeconds = null;
		$this->expiryStamp = null;
		$this->description = null;

		parent::__construct($aData);
		$this->setProperties($oDTValue);

		$oDTValue = DTValue::create()->set_mValue($aData); 
		\MVC\Event::run('DTAppTableQueue.__construct.after', $oDTValue);
	}

    /**
     * @param array|null $aData
     * @return DTAppTableQueue
     * @throws \ReflectionException
     */
    public static function create(?array $aData = array())
    {            
        (null === $aData) ? $aData = array() : false;
        $oDTValue = DTValue::create()->set_mValue($aData);
		\MVC\Event::run('DTAppTableQueue.create.before', $oDTValue);
		$oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::run('DTAppTableQueue.create.after', $oDTValue);

        return $oDTValue->get_mValue();
    }

	/**
     * @deprecated
     * @param array $aData
     * @return array
     * @throws \ReflectionException
     */
    public static function cast(array $aData = array())
    {
        $oThis = new self();

        foreach ($aData as $sKey => $sValue)
        {
            $sVar = $aData[$sKey];
            settype($sVar, $oThis->getDocCommentValueOfProperty($sKey));
            $aData[$sKey] = $sVar;
        }

        return $aData;
    }

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_key(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableQueue.set_key.before', $oDTValue);
		$this->key = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string|null $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_key2(?string $mValue = null)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableQueue.set_key2.before', $oDTValue);
		$this->key2 = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_value(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableQueue.set_value.before', $oDTValue);
		$this->value = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_valueMd5(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableQueue.set_valueMd5.before', $oDTValue);
		$this->valueMd5 = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param int|null $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_expirySeconds(?int $mValue = null)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableQueue.set_expirySeconds.before', $oDTValue);
		$this->expirySeconds = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param int|null $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_expiryStamp(?int $mValue = null)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableQueue.set_expiryStamp.before', $oDTValue);
		$this->expiryStamp = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string|null $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_description(?string $mValue = null)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableQueue.set_description.before', $oDTValue);
		$this->description = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_key() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->key); 
		\MVC\Event::run('DTAppTableQueue.get_key.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string|null
	 * @throws \ReflectionException
	 */
	public function get_key2() : ?string
	{
		$oDTValue = DTValue::create()->set_mValue($this->key2); 
		\MVC\Event::run('DTAppTableQueue.get_key2.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_value() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->value); 
		\MVC\Event::run('DTAppTableQueue.get_value.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_valueMd5() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->valueMd5); 
		\MVC\Event::run('DTAppTableQueue.get_valueMd5.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return int|null
	 * @throws \ReflectionException
	 */
	public function get_expirySeconds() : ?int
	{
		$oDTValue = DTValue::create()->set_mValue($this->expirySeconds); 
		\MVC\Event::run('DTAppTableQueue.get_expirySeconds.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return int|null
	 * @throws \ReflectionException
	 */
	public function get_expiryStamp() : ?int
	{
		$oDTValue = DTValue::create()->set_mValue($this->expiryStamp); 
		\MVC\Event::run('DTAppTableQueue.get_expiryStamp.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string|null
	 * @throws \ReflectionException
	 */
	public function get_description() : ?string
	{
		$oDTValue = DTValue::create()->set_mValue($this->description); 
		\MVC\Event::run('DTAppTableQueue.get_description.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_key()
	{
        return 'key';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_key2()
	{
        return 'key2';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_value()
	{
        return 'value';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_valueMd5()
	{
        return 'valueMd5';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_expirySeconds()
	{
        return 'expirySeconds';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_expiryStamp()
	{
        return 'expiryStamp';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_description()
	{
        return 'description';
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
