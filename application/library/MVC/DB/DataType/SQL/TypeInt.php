<?php

/**
 * @name $MVCDBDataTypeSQL
 */
namespace MVC\DB\DataType\SQL;

use MVC\DataType\DTValue;
use MVC\MVCTrait\TraitDataType;

class TypeInt extends FieldTypeConcrete
{
	use TraitDataType;

	public const DTHASH = 'da4597de003f66f5e0542ba8715931ad';

	/**
	 * TypeInt constructor.
    /**
     * @param \MVC\DataType\DTValue $oDTValue
     * @throws \ReflectionException
     */
    protected function __construct(DTValue $oDTValue)
	{
		\MVC\Event::run('TypeInt.__construct.before', $oDTValue);
		$aData = $oDTValue->get_mValue();

		parent::__construct($aData);


		foreach ($aData as $sKey => $mValue)
		{
			$sMethod = 'set_' . $sKey;

			if (method_exists($this, $sMethod))
			{
				$this->$sMethod($mValue);
			}
		}

		$oDTValue = DTValue::create()->set_mValue($aData); \MVC\Event::run('TypeInt.__construct.after', $oDTValue);
	}

    /**
     * @param array $aData
     * @return TypeInt
     * @throws \ReflectionException
     */
    public static function create(array $aData = array())
    {
        $oDTValue = DTValue::create()->set_mValue($aData);
		\MVC\Event::run('TypeInt.create.before', $oDTValue);
		$oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::run('TypeInt.create.after', $oDTValue);

        return $oDTValue->get_mValue();
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
        return json_encode($this->getPropertyArray());
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
