<?php
/**
 * Type_Application_vnd_ibm_afplinedata_OBSOLETED_in_favor_of_vnd_afpc_afplinedata.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_ibm_afplinedata_OBSOLETED_in_favor_of_vnd_afpc_afplinedata
{
    use TraitMediaType;

    /**
     * @reference [Roger_Buis]
	 * @deprecated OBSOLETED in favor of vndafpcafplinedata
     */
    const DESCRIPTION = 'application/vnd.ibm.afplinedata';
}