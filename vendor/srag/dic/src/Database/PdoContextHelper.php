<?php

namespace srag\DIC\SrMoveAssessmentToolbar\Database;

use ilDBPdo;
use ilDBPdoInterface;
use PDO;
use srag\DIC\SrMoveAssessmentToolbar\Exception\DICException;

/**
 * Class PdoContextHelper
 *
 * @package srag\DIC\SrMoveAssessmentToolbar\Database
 *
 * @internal
 */
final class PdoContextHelper extends ilDBPdo
{

    /**
     * PdoContextHelper constructor
     */
    private function __construct()
    {

    }


    /**
     * @param ilDBPdoInterface $db
     *
     * @return PDO
     *
     * @throws DICException PdoContextHelper only supports ilDBPdo!
     *
     * @internal
     */
    public static function getPdo(ilDBPdoInterface $db) : PDO
    {
        if (!($db instanceof ilDBPdo)) {
            throw new DICException("PdoContextHelper only supports ilDBPdo!");
        }

        return $db->pdo;
    }


    /**
     * @inheritDoc
     */
    public function initHelpers()
    {

    }
}
