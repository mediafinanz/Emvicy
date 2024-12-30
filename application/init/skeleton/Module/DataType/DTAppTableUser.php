<?php

/**
 * @name ${module}DataType
 */
namespace {module}\DataType;

use MVC\DataType\DTValue;
use MVC\MVCTrait\TraitDataType;

class DTAppTableUser extends \MVC\DB\DataType\DB\TableDataType
{
	use TraitDataType;

	public const DTHASH = '0d3ff21ac08e7a62c705d0816a8ffc84';

	/**
	 * @required true
	 * @var int|null
	 */
	protected $id_AppTableGroup;

	/**
	 * @required true
	 * @var string
	 */
	protected $email;

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
	protected $uuidtmp;

	/**
	 * @required true
	 * @var string
	 */
	protected $password;

	/**
	 * @required true
	 * @var string
	 */
	protected $nickname;

	/**
	 * @required true
	 * @var string
	 */
	protected $forename;

	/**
	 * @required true
	 * @var string
	 */
	protected $lastname;

	/**
	 * @required true
	 * @var string
	 */
	protected $description;

	/**
	 * DTAppTableUser constructor.
	 * @param DTValue $oDTValue
	 * @throws \ReflectionException 
	 */
	protected function __construct(DTValue $oDTValue)
	{
		\MVC\Event::run('DTAppTableUser.__construct.before', $oDTValue);
		$aData = $oDTValue->get_mValue();

		$this->id_AppTableGroup = null;
		$this->email = '';
		$this->active = 0;
		$this->uuid = '';
		$this->uuidtmp = '';
		$this->password = '';
		$this->nickname = '';
		$this->forename = '';
		$this->lastname = '';
		$this->description = '';

		parent::__construct($aData);
		$this->setProperties($oDTValue);

		$oDTValue = DTValue::create()->set_mValue($aData); 
		\MVC\Event::run('DTAppTableUser.__construct.after', $oDTValue);
	}

    /**
     * @param array|null $aData
     * @return DTAppTableUser
     * @throws \ReflectionException
     */
    public static function create(?array $aData = array())
    {            
        (null === $aData) ? $aData = array() : false;
        $oDTValue = DTValue::create()->set_mValue($aData);
		\MVC\Event::run('DTAppTableUser.create.before', $oDTValue);
		$oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::run('DTAppTableUser.create.after', $oDTValue);

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
	 * @param int|null $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_id_AppTableGroup(?int $mValue = null)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableUser.set_id_AppTableGroup.before', $oDTValue);
		$this->id_AppTableGroup = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_email(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableUser.set_email.before', $oDTValue);
		$this->email = (string) $oDTValue->get_mValue();

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
		\MVC\Event::run('DTAppTableUser.set_active.before', $oDTValue);
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
		\MVC\Event::run('DTAppTableUser.set_uuid.before', $oDTValue);
		$this->uuid = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_uuidtmp(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableUser.set_uuidtmp.before', $oDTValue);
		$this->uuidtmp = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_password(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableUser.set_password.before', $oDTValue);
		$this->password = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_nickname(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableUser.set_nickname.before', $oDTValue);
		$this->nickname = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_forename(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableUser.set_forename.before', $oDTValue);
		$this->forename = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_lastname(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTAppTableUser.set_lastname.before', $oDTValue);
		$this->lastname = (string) $oDTValue->get_mValue();

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
		\MVC\Event::run('DTAppTableUser.set_description.before', $oDTValue);
		$this->description = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @return int|null
	 * @throws \ReflectionException
	 */
	public function get_id_AppTableGroup() : ?int
	{
		$oDTValue = DTValue::create()->set_mValue($this->id_AppTableGroup); 
		\MVC\Event::run('DTAppTableUser.get_id_AppTableGroup.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_email() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->email); 
		\MVC\Event::run('DTAppTableUser.get_email.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return int
	 * @throws \ReflectionException
	 */
	public function get_active() : int
	{
		$oDTValue = DTValue::create()->set_mValue($this->active); 
		\MVC\Event::run('DTAppTableUser.get_active.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_uuid() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->uuid); 
		\MVC\Event::run('DTAppTableUser.get_uuid.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_uuidtmp() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->uuidtmp); 
		\MVC\Event::run('DTAppTableUser.get_uuidtmp.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_password() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->password); 
		\MVC\Event::run('DTAppTableUser.get_password.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_nickname() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->nickname); 
		\MVC\Event::run('DTAppTableUser.get_nickname.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_forename() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->forename); 
		\MVC\Event::run('DTAppTableUser.get_forename.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_lastname() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->lastname); 
		\MVC\Event::run('DTAppTableUser.get_lastname.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_description() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->description); 
		\MVC\Event::run('DTAppTableUser.get_description.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_id_AppTableGroup()
	{
        return 'id_AppTableGroup';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_email()
	{
        return 'email';
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
	public static function getPropertyName_uuidtmp()
	{
        return 'uuidtmp';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_password()
	{
        return 'password';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_nickname()
	{
        return 'nickname';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_forename()
	{
        return 'forename';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_lastname()
	{
        return 'lastname';
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
