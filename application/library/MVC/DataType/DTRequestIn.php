<?php

/**
 * @name $MVCDataType
 */
namespace MVC\DataType;

use MVC\DataType\DTValue;
use MVC\MVCTrait\TraitDataType;

class DTRequestIn
{
	use \MVC\MVCTrait\TraitRequestIncoming;

	use TraitDataType;

	public const DTHASH = 'ba46d67729355303434061541b1f1fba';

	/**
	 * @required false
	 * @var string
	 */
	protected $requestMethod;

	/**
	 * @required false
	 * @var string
	 */
	protected $full;

	/**
	 * @required false
	 * @var string
	 */
	protected $protocol;

	/**
	 * @required false
	 * @var string
	 */
	protected $scheme;

	/**
	 * @required false
	 * @var string
	 */
	protected $requestUri;

	/**
	 * @required false
	 * @var string
	 */
	protected $path;

	/**
	 * @required false
	 * @var string
	 */
	protected $host;

	/**
	 * @required false
	 * @var array
	 */
	protected $pathArray;

	/**
	 * @required false
	 * @var array
	 */
	protected $pathParamArray;

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
	 * @var array
	 */
	protected $headerArray;

	/**
	 * @required false
	 * @var string
	 */
	protected $input;

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
	 * DTRequestIn constructor.
	 * @param DTValue $oDTValue
	 * @throws \ReflectionException 
	 */
	protected function __construct(DTValue $oDTValue)
	{
		\MVC\Event::run('DTRequestIn.__construct.before', $oDTValue);
		$aData = $oDTValue->get_mValue();

		$this->requestMethod = '';
		$this->full = '';
		$this->protocol = '';
		$this->scheme = '';
		$this->requestUri = '';
		$this->path = '';
		$this->host = '';
		$this->pathArray = [];
		$this->pathParamArray = [];
		$this->query = '';
		$this->queryArray = [];
		$this->headerArray = [];
		$this->input = '';
		$this->ip = '';
		$this->cookieArray = [];
		$this->isSecure = false;
		$this->isCli = false;
		$this->isHttp = false;
		$this->setProperties($oDTValue);

		$oDTValue = DTValue::create()->set_mValue($aData); 
		\MVC\Event::run('DTRequestIn.__construct.after', $oDTValue);
	}

    /**
     * @param array|null $aData
     * @return DTRequestIn
     * @throws \ReflectionException
     */
    public static function create(?array $aData = array())
    {            
        (null === $aData) ? $aData = array() : false;
        $oDTValue = DTValue::create()->set_mValue($aData);
		\MVC\Event::run('DTRequestIn.create.before', $oDTValue);
		$oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::run('DTRequestIn.create.after', $oDTValue);

        return $oDTValue->get_mValue();
    }

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_requestMethod(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIn.set_requestMethod.before', $oDTValue);
		$this->requestMethod = (string) $oDTValue->get_mValue();

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
		\MVC\Event::run('DTRequestIn.set_full.before', $oDTValue);
		$this->full = (string) $oDTValue->get_mValue();

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
		\MVC\Event::run('DTRequestIn.set_protocol.before', $oDTValue);
		$this->protocol = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_scheme(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIn.set_scheme.before', $oDTValue);
		$this->scheme = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_requestUri(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIn.set_requestUri.before', $oDTValue);
		$this->requestUri = (string) $oDTValue->get_mValue();

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
		\MVC\Event::run('DTRequestIn.set_path.before', $oDTValue);
		$this->path = (string) $oDTValue->get_mValue();

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
		\MVC\Event::run('DTRequestIn.set_host.before', $oDTValue);
		$this->host = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param array  $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_pathArray(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTRequestIn.set_pathArray.before', $oDTValue);

		$this->pathArray = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 * @throws \ReflectionException 
	 */
	public function add_pathArray(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($this->pathArray); 
		\MVC\Event::run('DTRequestIn.add_pathArray.before', $oDTValue);

		$this->pathArray[] = $mValue;

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
		\MVC\Event::run('DTRequestIn.set_pathParamArray.before', $oDTValue);

		$this->pathParamArray = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 * @throws \ReflectionException 
	 */
	public function add_pathParamArray(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($this->pathParamArray); 
		\MVC\Event::run('DTRequestIn.add_pathParamArray.before', $oDTValue);

		$this->pathParamArray[] = $mValue;

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
		\MVC\Event::run('DTRequestIn.set_query.before', $oDTValue);
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
		\MVC\Event::run('DTRequestIn.set_queryArray.before', $oDTValue);

		$this->queryArray = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 * @throws \ReflectionException 
	 */
	public function add_queryArray(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($this->queryArray); 
		\MVC\Event::run('DTRequestIn.add_queryArray.before', $oDTValue);

		$this->queryArray[] = $mValue;

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
		\MVC\Event::run('DTRequestIn.set_headerArray.before', $oDTValue);

		$this->headerArray = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 * @throws \ReflectionException 
	 */
	public function add_headerArray(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($this->headerArray); 
		\MVC\Event::run('DTRequestIn.add_headerArray.before', $oDTValue);

		$this->headerArray[] = $mValue;

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
		\MVC\Event::run('DTRequestIn.set_input.before', $oDTValue);
		$this->input = (string) $oDTValue->get_mValue();

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
		\MVC\Event::run('DTRequestIn.set_ip.before', $oDTValue);
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
		\MVC\Event::run('DTRequestIn.set_cookieArray.before', $oDTValue);

		$this->cookieArray = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 * @throws \ReflectionException 
	 */
	public function add_cookieArray(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($this->cookieArray); 
		\MVC\Event::run('DTRequestIn.add_cookieArray.before', $oDTValue);

		$this->cookieArray[] = $mValue;

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
		\MVC\Event::run('DTRequestIn.set_isSecure.before', $oDTValue);
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
		\MVC\Event::run('DTRequestIn.set_isCli.before', $oDTValue);
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
		\MVC\Event::run('DTRequestIn.set_isHttp.before', $oDTValue);
		$this->isHttp = (bool) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_requestMethod() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->requestMethod); 
		\MVC\Event::run('DTRequestIn.get_requestMethod.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_full() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->full); 
		\MVC\Event::run('DTRequestIn.get_full.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_protocol() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->protocol); 
		\MVC\Event::run('DTRequestIn.get_protocol.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_scheme() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->scheme); 
		\MVC\Event::run('DTRequestIn.get_scheme.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_requestUri() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->requestUri); 
		\MVC\Event::run('DTRequestIn.get_requestUri.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_path() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->path); 
		\MVC\Event::run('DTRequestIn.get_path.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_host() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->host); 
		\MVC\Event::run('DTRequestIn.get_host.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_pathArray() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->pathArray); 
		\MVC\Event::run('DTRequestIn.get_pathArray.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_pathParamArray() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->pathParamArray); 
		\MVC\Event::run('DTRequestIn.get_pathParamArray.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_query() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->query); 
		\MVC\Event::run('DTRequestIn.get_query.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_queryArray() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->queryArray); 
		\MVC\Event::run('DTRequestIn.get_queryArray.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_headerArray() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->headerArray); 
		\MVC\Event::run('DTRequestIn.get_headerArray.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_input() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->input); 
		\MVC\Event::run('DTRequestIn.get_input.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_ip() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->ip); 
		\MVC\Event::run('DTRequestIn.get_ip.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_cookieArray() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->cookieArray); 
		\MVC\Event::run('DTRequestIn.get_cookieArray.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return bool
	 * @throws \ReflectionException
	 */
	public function get_isSecure() : bool
	{
		$oDTValue = DTValue::create()->set_mValue($this->isSecure); 
		\MVC\Event::run('DTRequestIn.get_isSecure.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return bool
	 * @throws \ReflectionException
	 */
	public function get_isCli() : bool
	{
		$oDTValue = DTValue::create()->set_mValue($this->isCli); 
		\MVC\Event::run('DTRequestIn.get_isCli.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return bool
	 * @throws \ReflectionException
	 */
	public function get_isHttp() : bool
	{
		$oDTValue = DTValue::create()->set_mValue($this->isHttp); 
		\MVC\Event::run('DTRequestIn.get_isHttp.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_requestMethod()
	{
        return 'requestMethod';
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
	public static function getPropertyName_protocol()
	{
        return 'protocol';
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
	public static function getPropertyName_requestUri()
	{
        return 'requestUri';
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
	public static function getPropertyName_host()
	{
        return 'host';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_pathArray()
	{
        return 'pathArray';
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
	public static function getPropertyName_headerArray()
	{
        return 'headerArray';
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
