<?php

namespace App\Table;

use MVC\DB\DataType\DB\Foreign;
use MVC\DB\Model\Db;
use MVC\DB\Trait\DbCollectionTrait;
use MVC\Event;
use MVC\Strings;

class User extends Db
{
    use DbCollectionTrait;

    /**
     * @var array
     */
    protected $aField = array();

    /**
     * @param array $aDbConfig
     * @param       $sProperty
     * @throws \ReflectionException
     */
    public function __construct(array $aDbConfig = array())
    {
        $this->aField = array(
            'email'     => "varchar(255)    NOT NULL UNIQUE         COMMENT 'e-mail'",
            'active'    => "int(1)          NOT NULL DEFAULT '0'    COMMENT 'active'",
            'uuid'      => "varchar(36)     NOT NULL DEFAULT UUID() UNIQUE COMMENT 'uuid permanent'",
            'uuidtmp'   => "varchar(36)         NULL UNIQUE         COMMENT 'uuid temporary'",
            'password'  => "varchar(60)     NOT NULL                COMMENT 'Password'",
            'nickname'  => "varchar(10)         NULL                COMMENT 'Abbreviation'",
            'forename'  => "varchar(25)         NULL                COMMENT 'First name'",
            'lastname'  => "varchar(25)         NULL                COMMENT 'Last name'",
            "description"   => "text            NULL                COMMENT 'Description'",
        );

        // run setup after "foreign tables"
        Event::bind('mvc.db.model.db.setForeignKey.after', function ($oDTValue) {
            // after `id_FooModelTableGroup` was added to this table
            if ($this->sTableName === $oDTValue->get_mValue()['sTable'] && 'id_AppTableGroup' === $oDTValue->get_mValue()['oDtDbForeign']->get_sForeignKey()) {
                self::setup($this->sTableName);
            }
        });

        // this table requires table Group
        Group::init($aDbConfig);

        // basic creation of the table
        parent::__construct($this->aField, $aDbConfig);

        $this->setForeignKey(
            Foreign::create()
                ->set_sForeignKey('id_AppTableGroup')
                ->set_sReferenceTable('AppTableGroup')
                ->set_sOnDelete(Foreign::DELETE_CASCADE)
                ->set_sComment('Group')
        );
    }

    /**
     * @param $sTablename
     * @return void
     * @throws \ReflectionException
     */
    public static function setup($sTablename = '')
    {
        $sDateTime = date('Y-m-d H:i:s');
        $sSql = "INSERT INTO `" . $sTablename . "` (`id`, `id_AppTableGroup`, `email`, `active`, `uuid`, `uuidtmp`, `password`, `nickname`, `forename`, `lastname`, `description`, `stampChange`, `stampCreate`) VALUES \n";
        $sSql.= "(1, 1, 'emvicy@example.com', 1, '" . Strings::uuid4() . "', '" . Strings::uuid4() . "', '". password_hash('emvicy@example.com', PASSWORD_DEFAULT) . "', 'root', 'emvicy', 'emvicy', '', '" . $sDateTime . "', '" . $sDateTime . "'),\n";
        $sSql = substr(trim($sSql), 0, -1);
        $sSql.= ";";

        $oStmt = \MVC\DB\Model\Db::getDbPdo()->query($sSql);
        $oStmt->closeCursor();
    }
}
