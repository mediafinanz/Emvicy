<?php

/**
 * @name $MVCDataType
 */
namespace MVC\DataType;

use MVC\DataType\DTValue;
use MVC\MVCTrait\TraitDataType;

class DTRequestIncoming
{
	use \MVC\MVCTrait\TraitRequestIncoming;

	use TraitDataType;

	public const DTHASH = 'c1fcd271f29abe4dea252a6d82280722';

	/**
	 * @required false
	 * @var string
	 */
	protected $scheme;

	/**
	 * @required false
	 * @var string
	 */
	protected $host;

	/**
	 * @required false
	 * @var string
	 */
	protected $path;

	/**
	 * @required false
	 * @var string
	 */
	protected $query;

	/**
	 * @required false
	 * @var array
	 */
	protected $queryArray;

	/**
	 * @required false
	 * @var string
	 */
	protected $requesturi;

	/**
	 * @required false
	 * @var string
	 */
	protected $requestmethod;

	/**
	 * @required false
	 * @var string
	 */
	protected $protocol;

	/**
	 * @required false
	 * @var string
	 */
	protected $full;

	/**
	 * @required false
	 * @var string
	 */
	protected $input;

	/**
	 * @required false
	 * @var bool
	 */
	protected $isSecure;

	/**
	 * @required false
	 * @var bool
	 */
	protected $isCli;

	/**
	 * @required false
	 * @var bool
	 */
	protected $isHttp;

	/**
	 * @required false
	 * @var array
	 */
	protected $headerArray;

	/**
	 * @required false
	 * @var array
	 */
	protected $pathParamArray;

	/**
	 * @required false
	 * @var string
	 */
	protected $ip;

	/**
	 * @required false
	 * @var array
	 */
	protected $cookieArray;

	/**
	 * DTRequestIncoming constructor.
	 * @param DTValue $oDTValue
	 * @throws \ReflectionException 
	 */
	protected function __construct(DTValue $oDTValue)
	{
		\MVC\Event::run('DTRequestIncoming.__construct.before', $oDTValue);
		$aData = $oDTValue->get_mValue();

		$this->scheme = '';
		$this->host = '';
		$this->path = '';
		$this->query = '';
		$this->queryArray = [];
		$this->requesturi = '';
		$this->requestmethod = '';
		$this->protocol = '';
		$this->full = '';
		$this->input = '';
		$this->isSecure = false;
		$this->isCli = false;
		$this->isHttp = false;
		$this->headerArray = [];
		$this->pathParamArray = [];
		$this->ip = '';
		$this->cookieArray = [];
		$this->setProperties($oDTValue);

		$oDTValue = DTValue::create()->set_mValue($aData); 
		\MVC\Event::run('DTRequestIncoming.__construct.after', $oDTValue);
	}

    /**
     * @param array|null $aData
     * @return DTRequestIncoming
     * @throws \ReflectionException
     */
    public static function create(?array $aData = array())
    {            
        (null === $aData) ? $aData = array() : false;
        $oDTValue = DTValue::create()->set_mValue($aData);
		\MVC\Event::run('DTRequestIncoming.create.before', $oDTValue);
		$oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::run('DTRequestIncoming.create.after', $oDTValue);

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
	public function set_scheme(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIncoming.set_scheme.before', $oDTValue);
		$this->scheme = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_host(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIncoming.set_host.before', $oDTValue);
		$this->host = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_path(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIncoming.set_path.before', $oDTValue);
		$this->path = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_query(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIncoming.set_query.before', $oDTValue);
		$this->query = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param array  $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_queryArray(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		
		$this->queryArray = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 */
	public function add_queryArray(array $mValue)
	{
		$this->queryArray[] = $mValue;

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_requesturi(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIncoming.set_requesturi.before', $oDTValue);
		$this->requesturi = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_requestmethod(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIncoming.set_requestmethod.before', $oDTValue);
		$this->requestmethod = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_protocol(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIncoming.set_protocol.before', $oDTValue);
		$this->protocol = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_full(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIncoming.set_full.before', $oDTValue);
		$this->full = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_input(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIncoming.set_input.before', $oDTValue);
		$this->input = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param bool $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_isSecure(bool $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIncoming.set_isSecure.before', $oDTValue);
		$this->isSecure = (bool) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param bool $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_isCli(bool $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIncoming.set_isCli.before', $oDTValue);
		$this->isCli = (bool) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param bool $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_isHttp(bool $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIncoming.set_isHttp.before', $oDTValue);
		$this->isHttp = (bool) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param array  $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_headerArray(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		
		$this->headerArray = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 */
	public function add_headerArray(array $mValue)
	{
		$this->headerArray[] = $mValue;

		return $this;
	}

	/**
	 * @param array  $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_pathParamArray(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		
		$this->pathParamArray = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 */
	public function add_pathParamArray(array $mValue)
	{
		$this->pathParamArray[] = $mValue;

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_ip(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIncoming.set_ip.before', $oDTValue);
		$this->ip = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param array  $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_cookieArray(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		
		$this->cookieArray = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 */
	public function add_cookieArray(array $mValue)
	{
		$this->cookieArray[] = $mValue;

		return $this;
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_scheme() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->scheme); 
		\MVC\Event::run('DTRequestIncoming.get_scheme.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_host() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->host); 
		\MVC\Event::run('DTRequestIncoming.get_host.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_path() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->path); 
		\MVC\Event::run('DTRequestIncoming.get_path.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_query() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->query); 
		\MVC\Event::run('DTRequestIncoming.get_query.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_queryArray() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->queryArray); 
		\MVC\Event::run('DTRequestIncoming.get_queryArray.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_requesturi() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->requesturi); 
		\MVC\Event::run('DTRequestIncoming.get_requesturi.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_requestmethod() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->requestmethod); 
		\MVC\Event::run('DTRequestIncoming.get_requestmethod.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_protocol() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->protocol); 
		\MVC\Event::run('DTRequestIncoming.get_protocol.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_full() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->full); 
		\MVC\Event::run('DTRequestIncoming.get_full.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_input() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->input); 
		\MVC\Event::run('DTRequestIncoming.get_input.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return bool
	 * @throws \ReflectionException
	 */
	public function get_isSecure() : bool
	{
		$oDTValue = DTValue::create()->set_mValue($this->isSecure); 
		\MVC\Event::run('DTRequestIncoming.get_isSecure.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return bool
	 * @throws \ReflectionException
	 */
	public function get_isCli() : bool
	{
		$oDTValue = DTValue::create()->set_mValue($this->isCli); 
		\MVC\Event::run('DTRequestIncoming.get_isCli.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return bool
	 * @throws \ReflectionException
	 */
	public function get_isHttp() : bool
	{
		$oDTValue = DTValue::create()->set_mValue($this->isHttp); 
		\MVC\Event::run('DTRequestIncoming.get_isHttp.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_headerArray() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->headerArray); 
		\MVC\Event::run('DTRequestIncoming.get_headerArray.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_pathParamArray() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->pathParamArray); 
		\MVC\Event::run('DTRequestIncoming.get_pathParamArray.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_ip() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->ip); 
		\MVC\Event::run('DTRequestIncoming.get_ip.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_cookieArray() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->cookieArray); 
		\MVC\Event::run('DTRequestIncoming.get_cookieArray.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_scheme()
	{
        return 'scheme';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_host()
	{
        return 'host';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_path()
	{
        return 'path';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_query()
	{
        return 'query';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_queryArray()
	{
        return 'queryArray';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_requesturi()
	{
        return 'requesturi';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_requestmethod()
	{
        return 'requestmethod';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_protocol()
	{
        return 'protocol';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_full()
	{
        return 'full';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_input()
	{
        return 'input';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_isSecure()
	{
        return 'isSecure';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_isCli()
	{
        return 'isCli';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_isHttp()
	{
        return 'isHttp';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_headerArray()
	{
        return 'headerArray';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_pathParamArray()
	{
        return 'pathParamArray';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_ip()
	{
        return 'ip';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_cookieArray()
	{
        return 'cookieArray';
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
