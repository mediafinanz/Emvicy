<?php
/**
 * DTConstant.php
 * @package   Emvicy
 * @copyright ueffing.net
 * @author    Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license   GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

/**
 * @name $MVCDataType
 */
namespace MVC\DataType;

class DTConstant
{
	public const DTHASH = 'db831a10dbfd980ff4183c8f0be6610c';

	/**
	 * @var string
	 */
	protected $key;

	/**
	 * @var mixed
	 */
	protected $value;

	/**
	 * @var string
	 */
	protected $visibility;

	/**
	 * DTConstant constructor.
	 * @param array $aData
	 * @throws \ReflectionException 
	 */
    protected function __construct(DTValue $oDTValue)
	{
        \MVC\Event::RUN ('DTConstant.__construct.before', $oDTValue);
        $aData = $oDTValue->get_mValue();

		$this->key = '';
		$this->value = null;
		$this->visibility = '';

		foreach ($aData as $sKey => $mValue)
		{
			$sMethod = 'set_' . $sKey;

			if (method_exists($this, $sMethod))
			{
				$this->$sMethod($mValue);
			}
		}

        $oDTValue = DTValue::create()->set_mValue($aData);
        \MVC\Event::RUN ('DTConstant.__construct.after', $oDTValue);
	}

    /**
     * @param array $aData
     * @return DTConstant
     * @throws \ReflectionException
     */
    public static function create(array $aData = array())
    {
        $oDTValue = DTValue::create()->set_mValue($aData); \MVC\Event::RUN ('DTConstant.create.before', $oDTValue);
        $oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::RUN ('DTConstant.create.after', $oDTValue);

        return $oDTValue->get_mValue();
    }

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_key(string $mValue)
	{
        $oDTValue = DTValue::create()->set_mValue($mValue); \MVC\Event::RUN ('DTConstant.set_key.before', $oDTValue);
		$this->key = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param mixed $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_value($mValue)
	{
        $oDTValue = DTValue::create()->set_mValue($mValue); \MVC\Event::RUN ('DTConstant.set_value.before', $oDTValue);
		$this->value = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_visibility(string $mValue)
	{
        $oDTValue = DTValue::create()->set_mValue($mValue); \MVC\Event::RUN ('DTConstant.set_visibility.before', $oDTValue);
		$this->visibility = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_key() : string
	{
        $oDTValue = DTValue::create()->set_mValue($this->key); \MVC\Event::RUN ('DTConstant.get_key.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return mixed
	 * @throws \ReflectionException
	 */
	public function get_value()
	{
        $oDTValue = DTValue::create()->set_mValue($this->value); \MVC\Event::RUN ('DTConstant.get_value.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_visibility() : string
	{
        $oDTValue = DTValue::create()->set_mValue($this->visibility); \MVC\Event::RUN ('DTConstant.get_visibility.before', $oDTValue);

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
	public static function getPropertyName_value()
	{
        return 'value';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_visibility()
	{
        return 'visibility';
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
		foreach ($this->getPropertyArray() as $sKey => $aValue)
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