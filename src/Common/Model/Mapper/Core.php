<?php
namespace Common\Model\Mapper;

use Common\Model\Mapper;
use Common\Model\Mapper\Exception;
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
    protected $_dao;

    public function __construct(Dao $dao = null)
    {
        if (!empty($dao)) {
            $this->setDao($dao);
        }
    }

    /**
     * @throws Exception\NotFound
     * @return Dao
     */
    public function getDao()
    {
        if (empty($this->_dao)) {
            throw new Exception\NotFound('Dao not found. Use $mapper->setDao($dao)');
        }
        return $this->_dao;
    }

    /**
     * @param Dao $dao
     *
     * @internal param $Dao
     * @return $this
     */
    public function setDao(Dao $dao)
    {
        $this->_dao = $dao;

        return $this;
    }


}