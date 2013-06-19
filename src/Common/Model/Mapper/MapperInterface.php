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

    /**
     * @param Dao $dao
     * @return MapperInterface
     */
    public function setDao(Dao $dao);
}