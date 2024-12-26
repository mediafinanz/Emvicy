<?php
/**
 * Type_Application_vnd_chess_pgn.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_chess_pgn
{
    use TraitMediaType;

    /**
     * @reference [Kim_Scarborough]
     */
    const DESCRIPTION = 'application/vnd.chess-pgn';
}