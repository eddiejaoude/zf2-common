<?php
namespace Common\Model\Mapper;

use Common\Model\Dao\DaoInterface as Dao;

/**
 * Class MapperInterface
 *
 * @package Common\Model\Mapper
 */
interface MapperInterface
{

    /**
     * @return Dao
     */
    public function getDao();
    public function setDao(Dao $dao);
}