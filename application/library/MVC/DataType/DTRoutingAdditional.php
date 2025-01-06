<?php

/**
 * @name $MVCDataType
 */
namespace MVC\DataType;

use MVC\DataType\DTValue;
use MVC\MVCTrait\TraitDataType;

class DTRoutingAdditional
{
	use TraitDataType;

	public const DTHASH = '7f9a10857e96506212abc60a0e1644f9';

	/**
	 * @required true
	 * @var string
	 */
	protected $sTitle;

	/**
	 * @required true
	 * @var string
	 */
	protected $sTemplate;

	/**
	 * @required true
	 * @var string
	 */
	protected $sContent;

	/**
	 * @required true
	 * @var array
	 */
	protected $aStyle;

	/**
	 * @required true
	 * @var array
	 */
	protected $aScript;

	/**
	 * DTRoutingAdditional constructor.
	 * @param DTValue $oDTValue
	 * @throws \ReflectionException 
	 */
	protected function __construct(DTValue $oDTValue)
	{
		\MVC\Event::run('DTRoutingAdditional.__construct.before', $oDTValue);
		$this->sTitle = '';
		$this->sTemplate = '';
		$this->sContent = '';
		$this->aStyle = [];
		$this->aScript = [];
		$this->setProperties($oDTValue);

		$aData = $oDTValue->get_mValue();
		$oDTValue = DTValue::create()->set_mValue($aData); 
		\MVC\Event::run('DTRoutingAdditional.__construct.after', $oDTValue);
	}

    /**
     * @param array|null $aData
     * @return DTRoutingAdditional
     * @throws \ReflectionException
     */
    public static function create(?array $aData = array())
    {            
        (null === $aData) ? $aData = array() : false;
        $oDTValue = DTValue::create()->set_mValue($aData);
		\MVC\Event::run('DTRoutingAdditional.create.before', $oDTValue);
		$oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::run('DTRoutingAdditional.create.after', $oDTValue);

        return $oDTValue->get_mValue();
    }

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_sTitle(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRoutingAdditional.set_sTitle.before', $oDTValue);
		$this->sTitle = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_sTemplate(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRoutingAdditional.set_sTemplate.before', $oDTValue);
		$this->sTemplate = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_sContent(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRoutingAdditional.set_sContent.before', $oDTValue);
		$this->sContent = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param array  $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_aStyle(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRoutingAdditional.set_aStyle.before', $oDTValue);

		$this->aStyle = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 * @throws \ReflectionException 
	 */
	public function add_aStyle(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($this->aStyle); 
		\MVC\Event::run('DTRoutingAdditional.add_aStyle.before', $oDTValue);

		$this->aStyle[] = $mValue;

		return $this;
	}

	/**
	 * @param array  $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_aScript(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRoutingAdditional.set_aScript.before', $oDTValue);

		$this->aScript = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 * @throws \ReflectionException 
	 */
	public function add_aScript(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($this->aScript); 
		\MVC\Event::run('DTRoutingAdditional.add_aScript.before', $oDTValue);

		$this->aScript[] = $mValue;

		return $this;
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_sTitle() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->sTitle); 
		\MVC\Event::run('DTRoutingAdditional.get_sTitle.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_sTemplate() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->sTemplate); 
		\MVC\Event::run('DTRoutingAdditional.get_sTemplate.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_sContent() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->sContent); 
		\MVC\Event::run('DTRoutingAdditional.get_sContent.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_aStyle() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->aStyle); 
		\MVC\Event::run('DTRoutingAdditional.get_aStyle.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_aScript() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->aScript); 
		\MVC\Event::run('DTRoutingAdditional.get_aScript.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_sTitle()
	{
        return 'sTitle';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_sTemplate()
	{
        return 'sTemplate';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_sContent()
	{
        return 'sContent';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_aStyle()
	{
        return 'aStyle';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_aScript()
	{
        return 'aScript';
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
