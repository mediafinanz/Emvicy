<?php
/**
 * DataType.php
 * @package   Emvicy
 * @copyright ueffing.net
 * @author    Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license   GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Generator;

use MVC\Cache;
use MVC\Closure;
use MVC\DataType\DTClass;
use MVC\DataType\DTConfig;
use MVC\DataType\DTConstant;
use MVC\DataType\DTProperty;
use MVC\Debug;
use MVC\Dir;
use MVC\Lock;

class DataType
{
    /**
     * @var bool
     */
    protected $bCreateEvents = false;

    /**
     * @var array
     */
    protected $aType = array(
        'string',
        'int',
        'bool',
        'array',
        'float',
        'double',
    );

    public function __construct()
    {
        ;
    }

    /**
     * @return self
     */
    public static function create()
    {
        $oObject = new self();

        return $oObject;
    }

    /**
     * @param array $aDataType
     * @return bool
     * @throws \ReflectionException
     */
    public function initConfigArray(array $aDataType = array())
    {
        $this->bCreateEvents = ($aDataType['createEvents'] ?? false);
        $oDTDataTypeGeneratorConfig = $this->buildDTDataTypeGeneratorConfigObject($aDataType);
        $bSuccess = $this->initConfigObject($oDTDataTypeGeneratorConfig);

        return $bSuccess;
    }

    /**
     * @param array $aConfig
     * @return \MVC\DataType\DTConfig
     * @throws \ReflectionException
     */
    public function buildDTDataTypeGeneratorConfigObject(array $aConfig = array())
    {
        // Config
        $oDTDataTypeGeneratorConfig = DTConfig::create();
        $oDTDataTypeGeneratorConfig->set_dir($aConfig['dir']);
        $oDTDataTypeGeneratorConfig->set_unlinkDir($aConfig['unlinkDir']);

        // Class
        foreach ($aConfig['class'] as $aDTClass)
        {
            $oDTDataTypeGeneratorClass = DTClass::create();
            $oDTDataTypeGeneratorClass->set_name($aDTClass['name']);
            $oDTDataTypeGeneratorClass->set_trait(($aDTClass['trait'] ?? array()));

            (0 == strlen($oDTDataTypeGeneratorClass->get_file()))
                ? $oDTDataTypeGeneratorClass->set_file($oDTDataTypeGeneratorClass->get_name() . '.php')
                : $oDTDataTypeGeneratorClass->set_file($aDTClass['file']);

            (isset($aDTClass['namespace']))
                ? $oDTDataTypeGeneratorClass->set_namespace($aDTClass['namespace'])
                : false;
            (isset($aDTClass['extends']))
                ? $oDTDataTypeGeneratorClass->set_extends($aDTClass['extends'])
                : false;
            (isset($aDTClass['createHelperMethods']))
                ? $oDTDataTypeGeneratorClass->set_createHelperMethods($aDTClass['createHelperMethods'])
                : false;

            // Constant
            if (isset($aDTClass['constant']) && !empty($aDTClass['constant']))
            {
                // sort
                usort($aDTClass['constant'], function ($a, $b) {return $a['key'] <=> $b['key'];});

                foreach ($aDTClass['constant'] as $aConstant)
                {
                    $oDTDataTypeGeneratorConstant = DTConstant::create();
                    (isset($aConstant['key']))
                        ? $oDTDataTypeGeneratorConstant->set_key(preg_replace('!\s+!', '_', $aConstant['key']))
                        : false;
                    (isset($aConstant['value']))
                        ? $oDTDataTypeGeneratorConstant->set_value($aConstant['value'])
                        : false;
                    (isset($aConstant['visibility']))
                        ? $oDTDataTypeGeneratorConstant->set_visibility($aConstant['visibility'])
                        : false;
                    $oDTDataTypeGeneratorClass->add_DTConstant($oDTDataTypeGeneratorConstant);
                }
            }

            // Property
            if (isset($aDTClass['property']) && !empty($aDTClass['property']))
            {
                foreach ($aDTClass['property'] as $aProperty)
                {
                    $oDTDataTypeGeneratorProperty = DTProperty::create();
                    (isset($aProperty['key']))
                        ? $oDTDataTypeGeneratorProperty->set_key(preg_replace('!\s+!', '_', $aProperty['key']))
                        : false;

                    (isset($aProperty['value']))
                        ? $oDTDataTypeGeneratorProperty->set_value($aProperty['value'])
                        : (('int' === ($aProperty['var'] ?? null)) ? $oDTDataTypeGeneratorProperty->set_value(0) : false);

                    (isset($aProperty['var']))
                        ? $oDTDataTypeGeneratorProperty->set_var($aProperty['var'])
                        : false;
                    (isset($aProperty['visibility']))
                        ? $oDTDataTypeGeneratorProperty->set_visibility($aProperty['visibility'])
                        : false;
                    (isset($aProperty['static']))
                        ? $oDTDataTypeGeneratorProperty->set_static($aProperty['static'])
                        : false;
                    (isset($aProperty['setter']))
                        ? $oDTDataTypeGeneratorProperty->set_setter($aProperty['setter'])
                        : false;
                    (isset($aProperty['getter']))
                        ? $oDTDataTypeGeneratorProperty->set_getter($aProperty['getter'])
                        : false;

                    (isset($aProperty['explicitMethodForValue']))
                        ? $oDTDataTypeGeneratorProperty->set_explicitMethodForValue($aProperty['explicitMethodForValue'])
                        : false;
                    (isset($aProperty['listProperty']))
                        ? $oDTDataTypeGeneratorProperty->set_listProperty($aProperty['listProperty'])
                        : false;
                    (isset($aProperty['createStaticPropertyGetter']))
                        ? $oDTDataTypeGeneratorProperty->set_createStaticPropertyGetter($aProperty['createStaticPropertyGetter'])
                        : false;
                    (isset($aProperty['setValueInConstructor']))
                        ? $oDTDataTypeGeneratorProperty->set_setValueInConstructor($aProperty['setValueInConstructor'])
                        : false;
                    (isset($aProperty['forceCasting']))
                        ? $oDTDataTypeGeneratorProperty->set_forceCasting($aProperty['forceCasting'])
                        : false;
                    (isset($aProperty['required']))
                        ? $oDTDataTypeGeneratorProperty->set_required($aProperty['required'])
                        : false;

                    $oDTDataTypeGeneratorClass->add_DTProperty($oDTDataTypeGeneratorProperty);
                }
            }

            $oDTDataTypeGeneratorConfig->add_DTClass($oDTDataTypeGeneratorClass);
        }

        return $oDTDataTypeGeneratorConfig;
    }

    /**
     * @param DTConfig $oDTDataTypeGeneratorConfig
     * @return bool
     * @throws \ReflectionException
     */
    public function initConfigObject(DTConfig $oDTDataTypeGeneratorConfig)
    {
        $sMd5 = (true === Closure::is($oDTDataTypeGeneratorConfig))
            // we just need a simple string representation; this is enough
            ? md5(base64_encode((string) new \ReflectionFunction($oDTDataTypeGeneratorConfig)))
            // default way
            : md5(base64_encode(serialize($oDTDataTypeGeneratorConfig)))
        ;
        $sCacheKey = preg_replace('/[^a-zA-Z0-9\.]+/', '_', trim(__CLASS__) . '.' . $sMd5);
        $bUnlinkDir = ('' !== $oDTDataTypeGeneratorConfig->get_unlinkDir())
            ? (boolean) $oDTDataTypeGeneratorConfig->get_unlinkDir()
            : false;

        if ($sCacheKey != Cache::getCache($sCacheKey))
        {
            Lock::create($sCacheKey);
            (true === $bUnlinkDir && file_exists($oDTDataTypeGeneratorConfig->get_dir()))
                ? $this->unlinkDataTypeClassDir($oDTDataTypeGeneratorConfig->get_dir())
                : false;

            $bSuccess = $this->iterateConfig($oDTDataTypeGeneratorConfig);

            if (false == $bSuccess)
            {
                return $bSuccess;
            }

            Cache::saveCache($sCacheKey, $sCacheKey);
        }

        return true;
    }

    /**
     * @param string $sDataTypeClassDir
     * @return bool
     * @throws \ReflectionException
     */
    private function unlinkDataTypeClassDir(string $sDataTypeClassDir = '')
    {
        if (file_exists($sDataTypeClassDir))
        {
            return Dir::remove($sDataTypeClassDir, true);
        }

        return false;
    }

    /**
     * @param string $sDataTypeClassDir
     * @param bool   $bCreateDirIfnotExist | default=false
     * @return $this|null
     */
    private function setDataTypeClassDir(string $sDataTypeClassDir = '', bool $bCreateDirIfnotExist = false)
    {
        if (true === $bCreateDirIfnotExist)
        {
            if (false === file_exists($sDataTypeClassDir) && false === Dir::make($sDataTypeClassDir))
            {
                return null;
            }
        }

        if (false === file_exists($sDataTypeClassDir) || false === is_dir($sDataTypeClassDir))
        {
            return null;
        }

        return $this;
    }

    /**
     * @param string $sClassname
     * @return $this|null
     */
    private function setClassName(string $sClassname = '')
    {
        if (empty($sClassname))
        {
            return null;
        }

        $this->sClassName = ucwords($sClassname);
        $this->sClassFileName = $this->sClassName . '.php';

        return $this;
    }

    /**
     * @param string $sClassFileName
     * @return $this|null
     */
    private function setClassFileName(string $sClassFileName = '')
    {
        if (empty($sClassFileName))
        {
            return null;
        }

        $this->sClassFileName = $sClassFileName;

        return $this;
    }

    /**
     * @param string $sClassNameSpace
     * @return $this|null
     */
    private function setClassNameSpace(string $sClassNameSpace = '')
    {
        if (empty($sClassNameSpace))
        {
            return null;
        }

        $this->sClassNamespace = $sClassNameSpace;

        return $this;
    }

    /**
     * @param string $sClassExtends
     * @return $this|null
     */
    private function setClassExtends(string $sClassExtends = '')
    {
        if (empty($sClassExtends))
        {
            return null;
        }

        $this->sClassExtends = $sClassExtends;

        return $this;
    }

    /**
     * @param string $sPropertyName
     * @param string $sVarType
     * @param null   $mValue
     * @param string $sVisibility
     * @return $this|null
     */
    private function setProperty(string $sPropertyName = '', string $sVarType = 'string', $mValue = null, string $sVisibility = 'protected')
    {
        if (0 == strlen($sPropertyName) || 0 == strlen($sVarType))
        {
            return null;
        }

        $aTmp = array();
        $aTmp['key'] = $sPropertyName;
        $aTmp['var'] = $sVarType;
        (null !== $mValue)
            ? $aTmp['value'] = $mValue
            : false;
        (false === empty($sVisibility))
            ? $aTmp['visibility'] = $sVisibility
            : false;

        $this->aProperty[] = $aTmp;

        return $this;
    }

    /**
     * @param \MVC\DataType\DTConfig $oDTDataTypeGeneratorConfig
     * @return bool
     * @throws \ReflectionException
     */
    private function iterateConfig(DTConfig $oDTDataTypeGeneratorConfig)
    {
        if ('' !== $oDTDataTypeGeneratorConfig->get_dir())
        {
            if (null === $this->setDataTypeClassDir($oDTDataTypeGeneratorConfig->get_dir(), true))
            {
                return false;
            }
        }

        $bSuccess = $this->createClass($oDTDataTypeGeneratorConfig);

        if (false === $bSuccess)
        {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    private function createDocHeader()
    {
        $sContent = '';
        $sContent.= "<?php\n\n";

        return $sContent;
    }

    /**
     * @param string $sNameSpace
     * @return string
     */
    private function createNamespace(string $sNameSpace = '')
    {
        $sContent = '';
        $sNameSpaceVar = preg_replace('/[^a-zA-Z_]+/', '', trim($sNameSpace));

        if (empty($sNameSpace))
        {
            return $sContent;
        }

        $sContent.= "/**\n * @name $" . $sNameSpaceVar . "\n */\nnamespace " . $sNameSpace . ";\n\n";

        return $sContent;
    }

    /**
     * @param \MVC\DataType\DTConfig $oDTDataTypeGeneratorConfig
     * @return bool
     * @throws \ReflectionException
     */
    private function createClass(DTConfig $oDTDataTypeGeneratorConfig)
    {
        foreach ($oDTDataTypeGeneratorConfig->get_class() as $oDTDataTypeGeneratorClass)
        {
            if (0 == strlen($oDTDataTypeGeneratorClass->get_name()))
            {
                return false;
            }

            (0 == strlen($oDTDataTypeGeneratorClass->get_file()))
                ? $oDTDataTypeGeneratorClass->set_file($oDTDataTypeGeneratorClass->get_name() . '.php')
                : false;

            $sClassFileAbs = $oDTDataTypeGeneratorConfig->get_dir() . '/' . $oDTDataTypeGeneratorClass->get_file();
            $sClassFileAbs = str_replace('//', '/', $sClassFileAbs);

            if (file_exists($sClassFileAbs))
            {
                unlink($sClassFileAbs);
            }

            (false === file_exists($sClassFileAbs))
                ? touch($sClassFileAbs)
                : false;

            $sContent = '';
            $sContent.= $this->createDocHeader();
            $sContent.= $this->createNamespace($oDTDataTypeGeneratorClass->get_namespace());
            $sContent.= "use MVC\DataType\DTValue;\n";
            $sContent.= "use MVC\MVCTrait\TraitDataType;\n\n";
            $sContent.= "class " . $oDTDataTypeGeneratorClass->get_name();

            // extends
            (0 != strlen($oDTDataTypeGeneratorClass->get_extends()))
                ? $sContent.= ' extends ' . $oDTDataTypeGeneratorClass->get_extends()
                : false;

            $sContent.= "\n{\n";

            // add traits
            foreach ($oDTDataTypeGeneratorClass->get_trait() as $sTrait)
            {
                $sContent.= "\tuse " . $sTrait . ";\n\n";
            }

            $sContent.= "\tuse TraitDataType;\n\n";

            // hash constant
            $sContent.= $this->createConst(DTConstant::create()
                ->set_key('DTHASH')
                ->set_value("'" . md5(base64_encode(serialize($oDTDataTypeGeneratorClass->get_constant()) . serialize($oDTDataTypeGeneratorClass->get_property()))) . "'")
                ->set_visibility('public'));

            foreach ($oDTDataTypeGeneratorClass->get_constant() as $oConstant)
            {
                $sContent.= $this->createConst($oConstant);
            }

            foreach ($oDTDataTypeGeneratorClass->get_property() as $oProperty)
            {
                $sContent.= $this->createProperty($oProperty);
            }

            $sContent.= $this->createConstructor($oDTDataTypeGeneratorClass);
            $sContent.= $this->createStaticCreator($oDTDataTypeGeneratorClass->get_name());

            foreach ($oDTDataTypeGeneratorClass->get_property() as $oProperty)
            {
                $sContent.= $this->createSetter($oProperty, $oDTDataTypeGeneratorClass->get_name());
            }

            foreach ($oDTDataTypeGeneratorClass->get_property() as $oProperty)
            {
                $sContent.= $this->createGetter($oProperty, $oDTDataTypeGeneratorClass->get_name());
            }

            foreach ($oDTDataTypeGeneratorClass->get_property() as $oProperty)
            {
                $sContent.= $this->createExplicitMethodForValue($oProperty);
            }

            HELPER_METHODS:
            {
                // on property
                foreach ($oDTDataTypeGeneratorClass->get_property() as $oProperty)
                {
                    $sContent.= $this->createStaticPropertyGetter($oProperty);
                }

                // for class
                if (true === $oDTDataTypeGeneratorClass->get_createHelperMethods())
                {
                    $sContent.= $this->createMagics();
                    $sContent.= $this->createHelpfulPropertyGetter();
                    $sContent.= $this->createHelpfulConstantGetter();
                    $sContent.= $this->createHelpfulPropertySetter();
                }
            }

            $sContent.= "}";

            $bSuccess = $this->writeInto($sClassFileAbs, $sContent);

            if (false === $bSuccess)
            {
                return false;
            }
        }

        return true;
    }

    /**
     * @param \MVC\DataType\DTConstant $oDTDataTypeGeneratorConstant
     * @return string
     * @throws \ReflectionException
     */
    private function createConst(DTConstant $oDTDataTypeGeneratorConstant)
    {
        if (0 == strlen($oDTDataTypeGeneratorConstant->get_key()) or is_null($oDTDataTypeGeneratorConstant->get_value()))
        {
            return '';
        }

        $sContent = '';
        $sContent.= "\t";
        $sContent.= $oDTDataTypeGeneratorConstant->get_visibility() . ' ';
        $sContent.= 'const ' . $oDTDataTypeGeneratorConstant->get_key() . ' = ';
        $sContent.= ('boolean' === gettype($oDTDataTypeGeneratorConstant->get_value()))
            ? (true === $oDTDataTypeGeneratorConstant->get_value())
                ? 'true'
                : 'false'
            : $oDTDataTypeGeneratorConstant->get_value();

        $sContent.= ";\n\n";

        return $sContent;
    }

    /**
     * @param \MVC\DataType\DTProperty $oProperty
     * @return string
     * @throws \ReflectionException
     */
    private function createProperty(DTProperty $oProperty)
    {
        if (true !== $oProperty->get_listProperty())
        {
            return '';
        }

        $sContent = '';
        $sContent.= "\t/**\n"
                    . "\t * @required " . ($oProperty->get_required() ? 'true' : 'false') . "\n"
                    . "\t * @var " . $oProperty->get_var()
                    . ( ((false === empty($oProperty->get_var())) && (false === $oProperty->get_forceCasting())) ? '|' : '')
                    . ((false === $oProperty->get_forceCasting()) ? 'null' : '') . "\n"
                    . "\t */\n";
        $sContent.= "\t" . $oProperty->get_visibility() . " ";
        (true === $oProperty->get_static())
            ? $sContent.= "static "
            : false;
        $sContent.= "$" . $oProperty->get_key();
        $sContent.= ';';
        $sContent.= "\n\n";

        return $sContent;
    }

    /**
     * @param \MVC\DataType\DTClass $oDTDataTypeGeneratorClass
     * @return string
     * @throws \ReflectionException
     */
    private function createConstructor(\MVC\DataType\DTClass $oDTDataTypeGeneratorClass)
    {
        $sContent = "\t/**\n\t * " . $oDTDataTypeGeneratorClass->get_name() . " constructor." . "\n\t * @param DTValue " . '$oDTValue' . "\n\t * @throws \ReflectionException " . "\n\t " . "*/\n\t";
        $sContent.= "protected function __construct(DTValue " . '$oDTValue' . ")\n\t";
        $sContent.= "{\n";

        (true === $this->bCreateEvents)
            ? $sContent.= "\t\t\MVC\Event::run('" . $oDTDataTypeGeneratorClass->get_name() . ".__construct.before', " . '$oDTValue' . ");\n"
            : false
        ;
        $sContent.= "\t\t" . '$aData = $oDTValue->get_mValue();' . "\n";

        foreach ($oDTDataTypeGeneratorClass->get_property() as $sKey => $oProperty)
        {
            if (false === $oProperty->get_setValueInConstructor())
            {
                continue;
            }

            if (true === $oProperty->get_static())
            {
                $sContent.= "\t\t" . 'self::$' . $oProperty->get_key() . ' = ';
            }
            else
            {
                $sContent.= "\t\t" . '$this->' . $oProperty->get_key() . ' = ';
            }

            // regular Types
            if (in_array($oProperty->get_var(), $this->aType))
            {
                if (is_null($oProperty->get_value()) || 'null' === $oProperty->get_value())
                {
                    $sContent.= 'null;'. "\n";
                }
                else
                {
                    if ('string' == strtolower($oProperty->get_var()))
                    {
                        $sContent.= (false === empty($oProperty->get_value()))
                            ? '"' . $oProperty->get_value() . '"' . ";\n"
                            : "'';\n";
                    }

                    if ('int' == substr(strtolower($oProperty->get_var()), 0, 3))
                    {
                        $sContent.= (is_null($oProperty->get_value()) || 'null' === $oProperty->get_value())
                            ? 'null;' . "\n"
                            : (int) $oProperty->get_value() . ';' . "\n";
                    }

                    if ('array' == strtolower($oProperty->get_var()))
                    {
                        $sContent.= (is_array($oProperty->get_value()))
                            ? preg_replace('!\s+!', '', str_replace("\n", '', Debug::varExport($oProperty->get_value(), true, false))) . ";\n"
                            : "[];\n";
                    }

                    if ('bool' == substr(strtolower($oProperty->get_var()), 0, 4))
                    {
                        $sContent.= (true === $oProperty->get_value())
                            ? 'true;' . "\n"
                            : 'false;' . "\n";
                    }

                    if ('float' == strtolower($oProperty->get_var()))
                    {
                        $sContent.= (true === is_null($oProperty->get_value()))
                            ? "0;\n"
                            : $oProperty->get_value() . ";\n";
                    }

                    if ('double' == strtolower($oProperty->get_var()))
                    {
                        $sContent.= (true === is_null($oProperty->get_value()))
                            ? "0;\n"
                            : $oProperty->get_value() . ";\n";
                    }
                }
            }
            else
            {
                // Object[] array
                if ('[]' == substr($oProperty->get_var(), -2))
                {
                    $sContent.= (is_array($oProperty->get_value()))
                        ? preg_replace('!\s+!', '', str_replace("\n", '', Debug::varExport($oProperty->get_value(), true, false))) . ";\n"
                        : "[];\n";
                }
                else
                {
                    $sContent.= (true === is_null($oProperty->get_value()))
                        ? "null;\n"
                        : $oProperty->get_value() . ';' . "\n";
                }
            }
        }

        if (false === empty($oDTDataTypeGeneratorClass->get_extends()))
        {
            $sContent.="\n";
            $sContent.="\t\t" . 'parent::__construct($oDTValue);' . "\n";
        }

        $sContent.="\t\t" . '$this->setProperties($oDTValue);' . "\n\n";
        $sContent.= "\t\t" . '$oDTValue = DTValue::create()->set_mValue($aData); ';

        (true === $this->bCreateEvents)
            ? $sContent.= "\n\t\t\MVC\Event::run('" . $oDTDataTypeGeneratorClass->get_name() . ".__construct.after', " . '$oDTValue' . ");"
            : false
        ;
        $sContent.= "\n\t}\n\n";

        return $sContent;
    }

    /**
     * @param string $sClassName
     * @return string
     */
    private function createStaticCreator(string $sClassName = '')
    {
        $sContent = "    /**
     * @param array|null " . '$aData' . "
     * @return " . $sClassName . "
     * @throws \ReflectionException
     */
    public static function create(?array " . '$aData' . " = array())
    {            
        " . '(null === $aData) ? $aData = array() : false;' . "
        " . '$oDTValue = DTValue::create()->set_mValue($aData);' . "\n"; (true === $this->bCreateEvents) ? $sContent.="\t\t\MVC\Event::run('" . $sClassName . ".create.before', " . '$oDTValue' . ");\n" : false; $sContent.="\t\t" . '$oObject' . " = new self(" . '$oDTValue' . ");
        " . '$oDTValue = DTValue::create()->set_mValue($oObject); '; (true === $this->bCreateEvents) ? $sContent.="\MVC\Event::run('" . $sClassName . ".create.after', " . '$oDTValue' . ");" : false; $sContent.="\n
        return " . '$oDTValue->get_mValue()' . ";
    }\n\n";

        return $sContent;
    }

    /**
     * @param \MVC\DataType\DTProperty $oProperty
     * @return string
     * @throws \ReflectionException
     */
    private function createExplicitMethodForValue(DTProperty $oProperty)
    {
        if (true !== $oProperty->get_explicitMethodForValue())
        {
            return '';
        }

        $sContent = "\t/**
     * @param array " . '$mValue' . "
     * @return " . $oProperty->get_var() . "
     */
    " . $oProperty->get_visibility() . " " . ((true === $oProperty->get_static())
                ? 'static '
                : false) . "function " . $oProperty->get_key() . "(" . '$mValue = array()' . ")"; # \n\t{";
        $sContent.= ' : ' . $oProperty->get_var();
        $sContent.= "\n\t{";

        // regular Types
        if (in_array($oProperty->get_var(), $this->aType))
        {
            $sContent.= "\n\t\t" . '$mVar' . " = ";

            if ('string' === strtolower($oProperty->get_var()))
            {
                $sContent.= '"' . (string)$oProperty->get_value() . '";' . "\n";
            }

            if ('int' === substr(strtolower($oProperty->get_var()), 0, 3))
            {
                $sContent.= (int)$oProperty->get_value() . ";\n";
            }

            if ('bool' === substr(strtolower($oProperty->get_var()), 0, 4))
            {
                ((true === $oProperty->get_value())
                    ? $sContent.= 'true;' . "\n"
                    : $sContent.= 'false;' . "\n");
            }

            if (null == substr(strtolower($oProperty->get_var()), 0, 3))
            {
                $sContent.= 'null;' . "\n";
            }
        }
        // object
        else
        {
            $sContent.= "\n\t\t" . '$mVar' . " = new " . $oProperty->get_var() . "(" . '$mValue' . ");\n";
        }

        $sContent.= "\n\t\treturn " . '$mVar;' . "\n\t}\n\n";

        return $sContent;
    }

    /**
     * @param \MVC\DataType\DTProperty $oProperty
     * @return string
     * @throws \ReflectionException
     */
    private function createStaticPropertyGetter(DTProperty $oProperty)
    {
        if (true !== $oProperty->get_createStaticPropertyGetter())
        {
            return '';
        }

        $sContent = '';
        $sContent.= "\t/**\n\t * @return string\n\t */\n\tpublic static function getPropertyName_" . $oProperty->get_key() . "()\n\t{
        return '" . $oProperty->get_key() . "';\n\t}\n\n";

        return $sContent;
    }

    /**
     * @return string
     */
    private function createMagics()
    {
        $sContent = '';
        $sContent.= "\t/**\n\t * @return false|string JSON\n\t */\n\tpublic function __toString()\n\t{
        return " . '$this->getPropertyJson();' . "\n\t}\n\n";

        return $sContent;
    }

    /**
     * @return string
     */
    private function createHelpfulPropertyGetter()
    {
        $sContent = '';
        $sContent.= "\t/**\n\t * @return false|string\n\t */\n\tpublic function getPropertyJson()\n\t{
        return json_encode(" . '\MVC\Convert::objectToArray($this));' . "\n\t}\n\n";

        $sContent.= "\t/**\n\t * @return array\n\t */\n\tpublic function getPropertyArray()\n\t{
        return " . 'get_object_vars($this);' . "\n\t}\n\n";

        return $sContent;
    }

    /**
     * @return string
     */
    private function createHelpfulConstantGetter()
    {
        $sContent = '';

        $sContent.= "\t/**\n\t * @return array\n\t * @throws \ReflectionException\n\t */\n\tpublic function getConstantArray()\n\t{\n\t\t";
        $sContent.= '$oReflectionClass = new \ReflectionClass($this);' . "\n\t\t";
        $sContent.= '$aConstant = $oReflectionClass->getConstants();' . "\n\n\t\t";
        $sContent.= "return " . '$aConstant;' . "\n\t}\n\n";

        return $sContent;
    }

    /**
     * @return string
     */
    private function createHelpfulPropertySetter()
    {
        $sContent = '';
        $sContent.= "\t/**\n\t * @return " . '$this' . "\n\t */\n\tpublic function flushProperties()\n\t{";
        $sContent.= "\n\t\tforeach (" . '$this->getPropertyArray() as $sKey => $mValue)' . "\n\t\t{\n\t\t\t";
        $sContent.= '$sMethod' . " = 'set_' . " . '$sKey;' . "\n\n\t\t\t";
        $sContent.= 'if (method_exists($this, $sMethod)) ' . "\n\t\t\t{";
        $sContent.= "\n\t\t\t\t" . '$this->$sMethod(\'\');' . "\n\t\t\t" . '}';
        $sContent.= "\n\t\t}\n\n\t\t" . 'return $this;' . "\n\t}\n\n";

        return $sContent;
    }

    /**
     * @param mixed $mObject
     * @return array
     */
    private function convertObjectToArray($mObject)
    {
        (is_object($mObject))
            ? $mObject = (array)$mObject
            : false;

        if (is_array($mObject))
        {
            $aNew = array();

            foreach ($mObject as $sKey => $mValue)
            {
                $sFirstChar = trim(substr(trim($sKey), 0, 1));
                (('*' === $sFirstChar))
                    ? $sKey = trim(substr(trim($sKey), 1))
                    : false;
                $aNew[$sKey] = $this->convertObjectToArray($mValue);
            }
        }
        else
        {
            $aNew = $mObject;
        }

        return $aNew;
    }

    /**
     * @param \MVC\DataType\DTProperty $oProperty
     * @param string                   $sClassName
     * @return string
     * @throws \ReflectionException
     */
    private function createSetter(DTProperty $oProperty, string $sClassName = '')
    {
        if (false === $oProperty->get_setter())
        {
            return '';
        }

        $sVar = trim(preg_replace("/[^[:alnum:][:space:]_\\\]/ui", '', $oProperty->get_var()));
        $sRight2 = substr($oProperty->get_var(), -2);
        $sContent = '';

        if ('[]' !== $sRight2 && 'array' !== $oProperty->get_var())
        {
            $sContent.= "\t/**\n" . "\t * @param " . $sVar . (('null' === $oProperty->get_value() || false === $oProperty->get_forceCasting()) ? '|null' : false) .' $mValue ' . "\n" . "\t * @return " . '$this' . "\n" . "\t * @throws \ReflectionException\n" . "\t */" . "\n";
            $sContent.= "\tpublic function set_" . $oProperty->get_key() . '(';

            $sContent.= ( (false === $oProperty->get_forceCasting() && ($sVar !== 'mixed')) ? '?' : false );

            $sContent.= $sVar . ' ';
            $sContent.= '$mValue';
            (('null' === $oProperty->get_value()) ? $sContent.= ' = null' : false);
            $sContent.= ')' . "\n" . "\t{" . "\n\t\t";
            $sContent.= '$oDTValue = DTValue::create()->set_mValue($mValue); ' . "\n\t\t";

            (true === $this->bCreateEvents) ? $sContent.="\MVC\Event::run('" . $sClassName . ".set_" . $oProperty->get_key() . ".before', " . '$oDTValue' . ");\n\t\t" : false;

            if (true === $oProperty->get_forceCasting())
            {
                // common types
                if (in_array($oProperty->get_var(), array('string', 'int', 'integer', 'array', 'bool', 'boolean', 'float', 'double')))
                {
                    $sContent.= '$this->' . $oProperty->get_key() . ' = (' . $oProperty->get_var() . ') $oDTValue->get_mValue();' . "\n\n" . "\t\treturn " . '$this;' . "\n\t}\n\n";
                }
                // mixed
                elseif (in_array($oProperty->get_var(), array('mixed')))
                {
                    $sContent.= '$this->' . $oProperty->get_key() . ' = $oDTValue->get_mValue();' . "\n\n" . "\t\treturn " . '$this;' . "\n\t}\n\n";
                }
                // custom types
                else
                {
                    $sContent.= '$this->' . $oProperty->get_key() . ' = $oDTValue->get_mValue();' . "\n\n" . "\t\treturn " . '$this;' . "\n\t}\n\n";
                }
            }
            else
            {
                $sContent.= '$this->' . $oProperty->get_key() . ' = $oDTValue->get_mValue();' . "\n\n" . "\t\treturn " . '$this;' . "\n\t}\n\n";
            }
        }
        // type is array
        else
        {
            $sContent.= "\t/**\n" . "\t * @param " . $oProperty->get_var() . (('null' === $oProperty->get_value() || false === $oProperty->get_forceCasting()) ? '|null' : false) . " " . ' $mValue ' . "\n" . "\t * @return " . '$this' . "\n" . "\t * @throws \ReflectionException\n" . "\t */" . "\n";
            $sContent.= "\tpublic function set_" . $oProperty->get_key() . '(';
            $sContent.= ( (false === $oProperty->get_forceCasting()) ? '?' : false );

            // place type for php7 and newer
            $sContent.= 'array ';
            $sContent.= '$mValue';
            (('null' === $oProperty->get_value()) ? $sContent.= ' = null' : false);
            $sContent.= ')' . "\n" . "\t{\n\t\t";
            $sContent.= '$oDTValue = DTValue::create()->set_mValue($mValue); ' . "\n\t\t";

            (true === $this->bCreateEvents) ? $sContent.= "\MVC\Event::run('" . $sClassName . ".set_" . $oProperty->get_key() . ".before', " . '$oDTValue' . ");\n" : false;

            // add ArrayType Instancer
            if (false === in_array(strtolower($sVar), $this->aType))
            {
                $sContent.= "\n\t\t" . '$mValue = (array) $oDTValue->get_mValue();
                
        foreach ($mValue as $mKey => $aData)
        {            
            if (false === ($aData instanceof ' . ucwords($sVar) . '))
            {
                $mValue[$mKey] = ' . ucwords($sVar) . '::create($aData);
            }
        }' . "\n";
            }

            $sContent.= "\n\t\t" . '$this->' . $oProperty->get_key() . ' = $mValue;' . "\n\n" . "\t\treturn " . '$this;' . "\n\t}\n\n";

            $sContent.= $this->createAddFunctionForArray($oProperty, $sClassName);
        }

        return $sContent;
    }

    /**
     * @param \MVC\DataType\DTProperty $oProperty
     * @param string                   $sClassName
     * @return string
     * @throws \ReflectionException
     */
    private function createGetter(DTProperty $oProperty, string $sClassName = '')
    {
        if (false === $oProperty->get_getter())
        {
            return '';
        }

        $sVar = trim(preg_replace("/[^[:alnum:][:space:]_\\\]/ui", ' ', $oProperty->get_var()));
        $sReturnType = trim(preg_replace("/[^[:alnum:][:space:]_\\\]/ui", ' ', $oProperty->get_var()));

        $sContent = '';
        $sContent.= "\t/**\n" . "\t * @return " . $oProperty->get_var() . ((false === $oProperty->get_forceCasting()) ? '|null' : '') . "\n" . "\t * @throws \ReflectionException\n" . "\t */\n";
        $sContent.= "\tpublic function get_" . $oProperty->get_key() . '()';

        (($sReturnType === $oProperty->get_var()) && ($sVar !== 'mixed'))
            ? $sContent.= ' : ' . ((false === $oProperty->get_forceCasting()) ? '?' : '') . $sVar
            : false;

        $sContent.= "\n";
        $sContent.= "\t{\n";
        $sContent.= "\t\t" . '$oDTValue = DTValue::create()->set_mValue($this->' . $oProperty->get_key() . '); ' . "\n";
        (true === $this->bCreateEvents) ? $sContent.= "\t\t\MVC\Event::run('" . $sClassName . ".get_" . $oProperty->get_key() . ".before', " . '$oDTValue' . ");" . "\n" : false; $sContent.="\n\t\t" . 'return $oDTValue->get_mValue();' . "\n\t}\n\n";

        return $sContent;
    }

    /**
     * @param \MVC\DataType\DTProperty $oProperty
     * @param string                   $sClassName
     * @return string
     * @throws \ReflectionException
     */
    private function createAddFunctionForArray(DTProperty $oProperty, string $sClassName)
    {
        $sVar = trim(preg_replace("/[^[:alnum:][:space:]_\\\]/ui", ' ', $oProperty->get_var()));
        $sContent = '';
        $sContent.= "\t/**\n\t * @param " . $sVar . ' $mValue' . "\n";
        $sContent.= "\t * @return " . '$this' . "\n";
        $sContent.= "\t * @throws \ReflectionException " . "\n\t */\n";
        $sContent.= "\tpublic function add_" . $oProperty->get_key() . '(' . $sVar . ' $mValue)';
        $sContent.= "\n";
        $sContent.= "\t{\n";

        $sContent.= "\t\t" . '$oDTValue = DTValue::create()->set_mValue($this->' . $oProperty->get_key() . '); ' . "\n";
        (true === $this->bCreateEvents) ? $sContent.= "\t\t\MVC\Event::run('" . $sClassName . ".add_" . $oProperty->get_key() . ".before', " . '$oDTValue' . ");" . "\n" : false; $sContent.="\n";

        $sContent.= "\t\t" . '$this->' . $oProperty->get_key() . '[] = $mValue;';
        $sContent.= "\n";
        $sContent.= "\n\t\treturn " . '$this;';
        $sContent.= "\n\t}\n\n";

        return $sContent;
    }

    /**
     * @param string $sFile
     * @param string $sContent
     * @return bool
     */
    private function writeInto($sFile = '', string $sContent = '')
    {
        return (boolean)file_put_contents($sFile, $sContent . PHP_EOL, FILE_APPEND);
    }
}