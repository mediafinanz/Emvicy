<?php

/**
 * @name $MVCDataType
 */
namespace MVC\DataType;

use MVC\DataType\DTValue;
use MVC\MVCTrait\TraitDataType;

class DTDBSet
{
	use TraitDataType;

	public const DTHASH = 'c470e8443ee30f9270d5e2575132a1da';

	/**
	 * @required true
	 * @var string
	 */
	protected $sKey;

	/**
	 * @required true
	 * @var mixed
	 */
	protected $sValue;

	/**
	 * DTDBSet constructor.
     * @param \MVC\DataType\DTValue $oDTValue
     * @throws \ReflectionException
     */
    protected function __construct(DTValue $oDTValue)
	{
		$aData = $oDTValue->get_mValue();

		$this->sKey = '';
		$this->sValue = null;

		foreach ($aData as $sKey => $mValue)
		{
			$sMethod = 'set_' . $sKey;

			if (method_exists($this, $sMethod))
			{
				$this->$sMethod($mValue);
			}
		}

		$oDTValue = DTValue::create()->set_mValue($aData); 
	}

    /**
     * @param array $aData
     * @return DTDBSet
     * @throws \ReflectionException
     */
    public static function create(array $aData = array())
    {
        $oDTValue = DTValue::create()->set_mValue($aData);
		$oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); 

        return $oDTValue->get_mValue();
    }

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_sKey(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		$this->sKey = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param mixed $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_sValue(mixed $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		$this->sValue = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_sKey() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->sKey); 

		return $oDTValue->get_mValue();
	}

	/**
	 * @return mixed
	 * @throws \ReflectionException
	 */
	public function get_sValue()
	{
		$oDTValue = DTValue::create()->set_mValue($this->sValue); 

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_sKey()
	{
        return 'sKey';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_sValue()
	{
        return 'sValue';
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
