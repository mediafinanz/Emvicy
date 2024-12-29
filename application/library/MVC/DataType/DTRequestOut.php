<?php

/**
 * @name $MVCDataType
 */
namespace MVC\DataType;

use MVC\DataType\DTValue;
use MVC\MVCTrait\TraitDataType;

class DTRequestOut
{
	use TraitDataType;

	public const DTHASH = 'd745a9938c06b74d5a3ef099bcff2706';

	/**
	 * @required true
	 * @var \MVC\Enum\EnumRequestMethod
	 */
	protected $eRequestMethod;

	/**
	 * @required true
	 * @var string
	 */
	protected $sUrl;

	/**
	 * @required true
	 * @var array
	 */
	protected $aHeader;

	/**
	 * @required true
	 * @var array
	 */
	protected $aData;

	/**
	 * @required true
	 * @var array
	 */
	protected $aOption;

	/**
	 * DTRequestOut constructor.
	 * @param DTValue $oDTValue
	 * @throws \ReflectionException 
	 */
	protected function __construct(DTValue $oDTValue)
	{
		\MVC\Event::run('DTRequestOut.__construct.before', $oDTValue);
		$aData = $oDTValue->get_mValue();

		$this->eRequestMethod = null;
		$this->sUrl = '';
		$this->aHeader = [];
		$this->aData = [];
		$this->aOption = [];
		$this->setProperties($oDTValue);

		$oDTValue = DTValue::create()->set_mValue($aData); 
		\MVC\Event::run('DTRequestOut.__construct.after', $oDTValue);
	}

    /**
     * @param array|null $aData
     * @return DTRequestOut
     * @throws \ReflectionException
     */
    public static function create(?array $aData = array())
    {            
        (null === $aData) ? $aData = array() : false;
        $oDTValue = DTValue::create()->set_mValue($aData);
		\MVC\Event::run('DTRequestOut.create.before', $oDTValue);
		$oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::run('DTRequestOut.create.after', $oDTValue);

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
	 * @param \MVC\Enum\EnumRequestMethod $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_eRequestMethod(\MVC\Enum\EnumRequestMethod $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestOut.set_eRequestMethod.before', $oDTValue);
		$this->eRequestMethod = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_sUrl(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestOut.set_sUrl.before', $oDTValue);
		$this->sUrl = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param array  $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_aHeader(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestOut.set_aHeader.before', $oDTValue);

		$this->aHeader = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 * @throws \ReflectionException 
	 */
	public function add_aHeader(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($this->aHeader); 
		\MVC\Event::run('DTRequestOut.add_aHeader.before', $oDTValue);

		$this->aHeader[] = $mValue;

		return $this;
	}

	/**
	 * @param array  $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_aData(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestOut.set_aData.before', $oDTValue);

		$this->aData = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 * @throws \ReflectionException 
	 */
	public function add_aData(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($this->aData); 
		\MVC\Event::run('DTRequestOut.add_aData.before', $oDTValue);

		$this->aData[] = $mValue;

		return $this;
	}

	/**
	 * @param array  $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_aOption(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestOut.set_aOption.before', $oDTValue);

		$this->aOption = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 * @throws \ReflectionException 
	 */
	public function add_aOption(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($this->aOption); 
		\MVC\Event::run('DTRequestOut.add_aOption.before', $oDTValue);

		$this->aOption[] = $mValue;

		return $this;
	}

	/**
	 * @return \MVC\Enum\EnumRequestMethod
	 * @throws \ReflectionException
	 */
	public function get_eRequestMethod() : \MVC\Enum\EnumRequestMethod
	{
		$oDTValue = DTValue::create()->set_mValue($this->eRequestMethod); 
		\MVC\Event::run('DTRequestOut.get_eRequestMethod.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_sUrl() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->sUrl); 
		\MVC\Event::run('DTRequestOut.get_sUrl.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_aHeader() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->aHeader); 
		\MVC\Event::run('DTRequestOut.get_aHeader.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_aData() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->aData); 
		\MVC\Event::run('DTRequestOut.get_aData.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_aOption() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->aOption); 
		\MVC\Event::run('DTRequestOut.get_aOption.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_eRequestMethod()
	{
        return 'eRequestMethod';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_sUrl()
	{
        return 'sUrl';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_aHeader()
	{
        return 'aHeader';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_aData()
	{
        return 'aData';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_aOption()
	{
        return 'aOption';
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
