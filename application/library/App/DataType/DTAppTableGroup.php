<?php

namespace App\DataType;

use MVC\DataType\DTValue;
use MVC\MVCTrait\TraitDataType;

class DTAppTableGroup extends \MVC\DB\DataType\DB\TableDataType
{
	use TraitDataType;

	public const DTHASH = '2c4cc437c4d13bb3f9c99d664809763d';

	/**
	 * @required true
	 * @var string
	 */
	protected $name;

	/**
	 * @required true
	 * @var int
	 */
	protected $gid;

	/**
	 * @required true
	 * @var int
	 */
	protected $active;

	/**
	 * @required true
	 * @var string
	 */
	protected $uuid;

	/**
	 * @required true
	 * @var string
	 */
	protected $description;

	/**
	 * DTAppTableGroup constructor.
	 * @param DTValue $oDTValue
	 * @throws \ReflectionException 
	 */
	protected function __construct(DTValue $oDTValue)
	{
		\MVC\Event::run('DTAppTableGroup.__construct.before', $oDTValue);
		$aData = $oDTValue->get_mValue();

		$this->name = '';
		$this->gid = 0;
		$this->active = 0;
		$this->uuid = '';
		$this->description = '';

		parent::__construct($aData);
		$this->setProperties($oDTValue);

		$oDTValue = DTValue::create()->set_mValue($aData); 
		\MVC\Event::run('DTAppTableGroup.__construct.after', $oDTValue);
	}

    /**
     * @param array|null $aData
     * @return DTAppTableGroup
     * @throws \ReflectionException
     */
    public static function create(?array $aData = array())
    {            
        (null === $aData) ? $aData = array() : false;
        $oDTValue = DTValue::create()->set_mValue($aData);
		\MVC\Event::run('DTAppTableGroup.create.before', $oDTValue);
		$oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::run('DTAppTableGroup.create.after', $oDTValue);

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
	public function set_name(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableGroup.set_name.before', $oDTValue);
		$this->name = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param int $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_gid(int $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableGroup.set_gid.before', $oDTValue);
		$this->gid = (int) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param int $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_active(int $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableGroup.set_active.before', $oDTValue);
		$this->active = (int) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_uuid(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableGroup.set_uuid.before', $oDTValue);
		$this->uuid = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_description(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableGroup.set_description.before', $oDTValue);
		$this->description = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_name() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->name); 
		\MVC\Event::run('DTAppTableGroup.get_name.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return int
	 * @throws \ReflectionException
	 */
	public function get_gid() : int
	{
		$oDTValue = DTValue::create()->set_mValue($this->gid); 
		\MVC\Event::run('DTAppTableGroup.get_gid.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return int
	 * @throws \ReflectionException
	 */
	public function get_active() : int
	{
		$oDTValue = DTValue::create()->set_mValue($this->active); 
		\MVC\Event::run('DTAppTableGroup.get_active.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_uuid() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->uuid); 
		\MVC\Event::run('DTAppTableGroup.get_uuid.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_description() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->description); 
		\MVC\Event::run('DTAppTableGroup.get_description.before', $oDTValue);

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
	public static function getPropertyName_gid()
	{
        return 'gid';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_active()
	{
        return 'active';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_uuid()
	{
        return 'uuid';
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
