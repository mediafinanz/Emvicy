<?php

/**
 * @name $MVCDataType
 */
namespace MVC\DataType;

use MVC\DataType\DTValue;
use MVC\MVCTrait\TraitDataType;

class DTFileinfo
{
	use TraitDataType;

	public const DTHASH = '90a71a3267e3d8d0e9b51f7d9ecbe137';

	/**
	 * @required true
	 * @var string
	 */
	protected $dirname;

	/**
	 * @required true
	 * @var string
	 */
	protected $basename;

	/**
	 * @required true
	 * @var string
	 */
	protected $path;

	/**
	 * @required true
	 * @var bool
	 */
	protected $is_file;

	/**
	 * @required true
	 * @var bool
	 */
	protected $is_dir;

	/**
	 * @required true
	 * @var string
	 */
	protected $extension;

	/**
	 * @required true
	 * @var string
	 */
	protected $filename;

	/**
	 * @required true
	 * @var string
	 */
	protected $name;

	/**
	 * @required true
	 * @var string
	 */
	protected $passwd;

	/**
	 * @required true
	 * @var int
	 */
	protected $uid;

	/**
	 * @required true
	 * @var int
	 */
	protected $gid;

	/**
	 * @required true
	 * @var int
	 */
	protected $filemtime;

	/**
	 * @required true
	 * @var int
	 */
	protected $filectime;

	/**
	 * @required true
	 * @var int
	 */
	protected $filesize;

	/**
	 * @required true
	 * @var string
	 */
	protected $gecos;

	/**
	 * @required true
	 * @var string
	 */
	protected $dir;

	/**
	 * @required true
	 * @var string
	 */
	protected $shell;

	/**
	 * @required true
	 * @var string
	 */
	protected $mimetype;

	/**
	 * DTFileinfo constructor.
	 * @param DTValue $oDTValue
	 * @throws \ReflectionException 
	 */
	protected function __construct(DTValue $oDTValue)
	{
		\MVC\Event::run('DTFileinfo.__construct.before', $oDTValue);
		$aData = $oDTValue->get_mValue();

		$this->dirname = '';
		$this->basename = '';
		$this->path = '';
		$this->is_file = false;
		$this->is_dir = false;
		$this->extension = '';
		$this->filename = '';
		$this->name = '';
		$this->passwd = '';
		$this->uid = 0;
		$this->gid = 0;
		$this->filemtime = 0;
		$this->filectime = 0;
		$this->filesize = 0;
		$this->gecos = '';
		$this->dir = '';
		$this->shell = '';
		$this->mimetype = '';
		$this->setProperties($oDTValue);

		$oDTValue = DTValue::create()->set_mValue($aData); 
		\MVC\Event::run('DTFileinfo.__construct.after', $oDTValue);
	}

    /**
     * @param array|null $aData
     * @return DTFileinfo
     * @throws \ReflectionException
     */
    public static function create(?array $aData = array())
    {            
        (null === $aData) ? $aData = array() : false;
        $oDTValue = DTValue::create()->set_mValue($aData);
		\MVC\Event::run('DTFileinfo.create.before', $oDTValue);
		$oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::run('DTFileinfo.create.after', $oDTValue);

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
	public function set_dirname(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_dirname.before', $oDTValue);
		$this->dirname = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_basename(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_basename.before', $oDTValue);
		$this->basename = (string) $oDTValue->get_mValue();

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
		\MVC\Event::run('DTFileinfo.set_path.before', $oDTValue);
		$this->path = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param bool $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_is_file(bool $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_is_file.before', $oDTValue);
		$this->is_file = (bool) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param bool $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_is_dir(bool $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_is_dir.before', $oDTValue);
		$this->is_dir = (bool) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_extension(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_extension.before', $oDTValue);
		$this->extension = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_filename(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_filename.before', $oDTValue);
		$this->filename = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_name(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_name.before', $oDTValue);
		$this->name = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_passwd(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_passwd.before', $oDTValue);
		$this->passwd = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param int $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_uid(int $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_uid.before', $oDTValue);
		$this->uid = (int) $oDTValue->get_mValue();

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
		\MVC\Event::run('DTFileinfo.set_gid.before', $oDTValue);
		$this->gid = (int) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param int $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_filemtime(int $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_filemtime.before', $oDTValue);
		$this->filemtime = (int) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param int $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_filectime(int $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_filectime.before', $oDTValue);
		$this->filectime = (int) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param int $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_filesize(int $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_filesize.before', $oDTValue);
		$this->filesize = (int) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_gecos(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_gecos.before', $oDTValue);
		$this->gecos = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_dir(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_dir.before', $oDTValue);
		$this->dir = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_shell(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_shell.before', $oDTValue);
		$this->shell = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_mimetype(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTFileinfo.set_mimetype.before', $oDTValue);
		$this->mimetype = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_dirname() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->dirname); 
		\MVC\Event::run('DTFileinfo.get_dirname.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_basename() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->basename); 
		\MVC\Event::run('DTFileinfo.get_basename.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_path() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->path); 
		\MVC\Event::run('DTFileinfo.get_path.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return bool
	 * @throws \ReflectionException
	 */
	public function get_is_file() : bool
	{
		$oDTValue = DTValue::create()->set_mValue($this->is_file); 
		\MVC\Event::run('DTFileinfo.get_is_file.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return bool
	 * @throws \ReflectionException
	 */
	public function get_is_dir() : bool
	{
		$oDTValue = DTValue::create()->set_mValue($this->is_dir); 
		\MVC\Event::run('DTFileinfo.get_is_dir.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_extension() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->extension); 
		\MVC\Event::run('DTFileinfo.get_extension.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_filename() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->filename); 
		\MVC\Event::run('DTFileinfo.get_filename.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_name() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->name); 
		\MVC\Event::run('DTFileinfo.get_name.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_passwd() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->passwd); 
		\MVC\Event::run('DTFileinfo.get_passwd.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return int
	 * @throws \ReflectionException
	 */
	public function get_uid() : int
	{
		$oDTValue = DTValue::create()->set_mValue($this->uid); 
		\MVC\Event::run('DTFileinfo.get_uid.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return int
	 * @throws \ReflectionException
	 */
	public function get_gid() : int
	{
		$oDTValue = DTValue::create()->set_mValue($this->gid); 
		\MVC\Event::run('DTFileinfo.get_gid.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return int
	 * @throws \ReflectionException
	 */
	public function get_filemtime() : int
	{
		$oDTValue = DTValue::create()->set_mValue($this->filemtime); 
		\MVC\Event::run('DTFileinfo.get_filemtime.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return int
	 * @throws \ReflectionException
	 */
	public function get_filectime() : int
	{
		$oDTValue = DTValue::create()->set_mValue($this->filectime); 
		\MVC\Event::run('DTFileinfo.get_filectime.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return int
	 * @throws \ReflectionException
	 */
	public function get_filesize() : int
	{
		$oDTValue = DTValue::create()->set_mValue($this->filesize); 
		\MVC\Event::run('DTFileinfo.get_filesize.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_gecos() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->gecos); 
		\MVC\Event::run('DTFileinfo.get_gecos.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_dir() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->dir); 
		\MVC\Event::run('DTFileinfo.get_dir.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_shell() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->shell); 
		\MVC\Event::run('DTFileinfo.get_shell.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_mimetype() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->mimetype); 
		\MVC\Event::run('DTFileinfo.get_mimetype.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_dirname()
	{
        return 'dirname';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_basename()
	{
        return 'basename';
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
	public static function getPropertyName_is_file()
	{
        return 'is_file';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_is_dir()
	{
        return 'is_dir';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_extension()
	{
        return 'extension';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_filename()
	{
        return 'filename';
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
	public static function getPropertyName_passwd()
	{
        return 'passwd';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_uid()
	{
        return 'uid';
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
	public static function getPropertyName_filemtime()
	{
        return 'filemtime';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_filectime()
	{
        return 'filectime';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_filesize()
	{
        return 'filesize';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_gecos()
	{
        return 'gecos';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_dir()
	{
        return 'dir';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_shell()
	{
        return 'shell';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_mimetype()
	{
        return 'mimetype';
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
