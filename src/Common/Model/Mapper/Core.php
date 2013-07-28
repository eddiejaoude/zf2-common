<?php
namespace Common\Model\Mapper;

use Common\Model\Mapper;
use Common\Model\Mapper\Exception\NotFound;
use Common\Model\Dao\DaoInterface as Dao;

/**
 * Class Table
 *
 * @package Common\Model\Mapper
 */
abstract class Core implements MapperInterface
{
    /**
     * @var Dao
     */
    protected $dao;

    public function __construct(Dao $dao = null)
    {
        if (!empty($dao)) {
            $this->setDao($dao);
        }
    }

    /**
     * @throws NotFound
     * @return Dao
     */
    public function getDao()
    {
        if (empty($this->dao)) {
            throw new NotFound('Dao not found. Use $mapper->setDao($dao)');
        }

        return $this->dao;
    }

    /**
     * @param Dao $dao
     *
     * @internal param $Dao
     * @return MapperInterface
     */
    public function setDao(Dao $dao)
    {
        $this->dao = $dao;

        return $this;
    }


}