<?php
/**
 * Openapi.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\DB\Model;

use MVC\Cache;
use MVC\Config;
use Symfony\Component\Yaml\Yaml;

class Openapi
{
    /**
     * builds an openapi.yaml "DTTables.yaml" in the primary module's DataType folder based on data type classes of the
     * DB tables
     * @param \MVC\DB\Model\DbCollection|null $oDB
     * @param string                          $sDtClassPrefix
     * @param string                          $sOpenApiVersion
     * @param string                          $sYamlFileName
     * @return string /absolute/path/to/file.yaml | empty=fail
     * @throws \ReflectionException
     */
    public static function createDTYamlOnDTClasses(?DbCollection $oDB = null, string $sDtClassPrefix = 'DT', string $sOpenApiVersion = '3.0.1', string $sYamlFileName = 'DTTables.yaml') : string
    {
        if (null === $oDB)
        {
            return '';
        }

        Cache::flushCache();

        (true === empty($sDtClassPrefix)) ? $sDtClassPrefix = 'DT' : false;
        (true === empty($sOpenApiVersion)) ? $sOpenApiVersion = '3.0.1' : false;

        $sDTFolderPre = '\\' . Config::get_MVC_MODULE_PRIMARY_NAME() . '\\' . basename(Config::get_MVC_MODULE_PRIMARY_DATATYPE_DIR());
        $sYamlFile = Config::get_MVC_MODULE_PRIMARY_DATATYPE_DIR() . '/' . basename($sYamlFileName);
        $aClassVar = get_object_vars($oDB);
        $aTmp = [
            'components' => [
                'schemas' => []
            ]
        ];

        foreach ($aClassVar as $sProperty => $mFoo)
        {
            $bMethodExists = method_exists($oDB->$sProperty, 'getFieldInfo');

            if (false === $bMethodExists)
            {
                continue;
            }

            $aFieldInfo = $oDB->$sProperty->getFieldInfo();
            $sClass = $oDB->getDocCommentValueOfProperty($sProperty);
            $sDtClassName = $sDtClassPrefix . str_replace('\\', '', $sClass);
            $sDTofClass = $sDTFolderPre . '\\' . $sDtClassName;
            $sDTClassFile = Config::get_MVC_MODULE_PRIMARY_DATATYPE_DIR() . '/' . $sDtClassName . '.php';

            if (false === file_exists($sDTClassFile))
            {
                return '';
            }

            /** @var \MVC\DB\DataType\DB\TableDataType $oDtTmp */
            $oDtTmp = $sDTofClass::create();

            $aTmp['components']['schemas'][$sDtClassName] = array();
            $aTmp['components']['schemas'][$sDtClassName]['type'] = 'object';
            $aTmp['components']['schemas'][$sDtClassName]['properties'] = array();

            foreach ($oDtTmp->getPropertyArray() as $sKey => $mValue)
            {
                $aTmp['components']['schemas'][$sDtClassName]['properties'][$sKey]['type'] = self::getType(gettype($mValue), ($aFieldInfo[$sKey]['Type'] ?? ''));

                if ('enum' === ($aFieldInfo[$sKey]['_type'] ?? null))
                {
                    $aTmp['components']['schemas'][$sDtClassName]['properties'][$sKey]['enum'] = ($aFieldInfo[$sKey]['_typeValue'] ?? null);
                }
                else
                {
                    $sFormat = self::getFormat(($aFieldInfo[$sKey]['_type'] ?? ''));
                    (false === empty($sFormat)) ? $aTmp['components']['schemas'][$sDtClassName]['properties'][$sKey]['format'] = $sFormat : false;

                    $bNullable = self::isNullable($mValue);
                    (true === $bNullable) ? $aTmp['components']['schemas'][$sDtClassName]['properties'][$sKey]['nullable'] = true : false;

                    (is_numeric(($aFieldInfo[$sKey]['_typeValue'] ?? null)) && 'string' === ($aFieldInfo[$sKey]['_php'] ?? null))
                        ? $aTmp['components']['schemas'][$sDtClassName]['properties'][$sKey]['maxLength'] = (int) ($aFieldInfo[$sKey]['_typeValue'] ?? null)
                        : false
                    ;

                    $aTmp['components']['schemas'][$sDtClassName]['properties'][$sKey]['default'] = self::getDefault($mValue);
                }

                (null !== ($aFieldInfo[$sKey]['Type'] ?? null))
                    ? $aTmp['components']['schemas'][$sDtClassName]['properties'][$sKey]['description'] = $aFieldInfo[$sKey]['Type']
                    : false
                ;
            }
        }

        $sYaml =
            trim('openapi: ' . $sOpenApiVersion
                 . "\n"
                 // array to yaml
                 . Yaml::dump($aTmp, 100, 2) /** @see https://symfony.com/doc/current/components/yaml.html */
            );

        file_put_contents(
            $sYamlFile,
            $sYaml
        );

        return $sYamlFile;
    }

    /**
     * @param mixed $mValue
     * @return mixed|string
     */
    protected static function getDefault(mixed $mValue)
    {
        if (true === is_null($mValue) || (true === is_string($mValue) && 'null' === strtolower($mValue)))
        {
            return '';
        }

        return $mValue;
    }

    /**
     * @param string $sType
     * @param string $sFieldInfoType
     * @return string
     */
    protected static function getType(string $sType = '', string $sFieldInfoType = '')
    {
        if (str_starts_with(strtolower($sFieldInfoType), 'varchar'))
        {
            $sType = 'string';
        }
        if (str_starts_with(strtolower($sFieldInfoType), 'int'))
        {
            $sType = 'integer';
        }
        if (str_ends_with(strtolower($sFieldInfoType), 'text'))
        {
            $sType = 'string';
        }

        $aType = array('string', 'number', 'integer', 'boolean', 'array');

        if (false === in_array($sType, $aType))
        {
            $sType = 'string';
        }

        return $sType;
    }

    /**
     * @param string $sType
     * @return string
     */
    protected static function getFormat(string $sType = '')
    {
        $sFormat = '';

        if('date' === $sType)
        {
            $sFormat = 'date';
        }

        if('datetime' === $sType)
        {
            $sFormat = 'date-time';
        }

        return $sFormat;
    }

    /**
     * @param string $mType
     * @return bool
     */
    protected static function isNullable(mixed $mType = '')
    {
        $bNullable = false;

        if (true === is_null($mType) || 'null' === strtolower($mType))
        {
            $bNullable = true;
        }

        return $bNullable;
    }
}