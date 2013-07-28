<?php
namespace Common\Model\Dao;

use Common\Model\Dao\Exception\Table\GatewayNotFound;
use Zend\Db\TableGateway\TableGateway;
use Common\Model\Dao\Exception\Table\NoTableName;

/**
 * Class Table
 *
 * @package Common\Model\Dao
 */
abstract class Table implements DaoInterface
{
    /**
     * @var string
     */
    protected $tableName = '';

    /**
     * @var TableGateway
     */
    protected $tableGateway;

    /**
     * @param TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway = null)
    {
        if (!empty($tableGateway)) {
            $this->tableGateway = $tableGateway;
        }
    }

    /**
     * @throws Exception\Table\GatewayNotFound
     * @return TableGateway
     */
    public function getTableGateway()
    {
        if (empty($this->tableGateway)) {
            throw new GatewayNotFound('Gateway required, use $dao->setTableGateway($tableGateway)');
        }
        return $this->tableGateway;
    }

    /**
     * @param TableGateway $tableGateway
     * @return DaoInterface
     */
    public function setTableGateway(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;

        return $this;
    }

    /**
     * Get table name
     */
    public function getTableName()
    {
        if (empty($this->tableName)) {
            throw new NoTableName('Table name required, set class property or use $dao->setTableName(\'TableName\')');
        }

        return $this->tableName;
    }

    /**
     * @param string $name
     * @return DaoInterface
     */
    public function setTableName($name)
    {
        $this->tableName = (string)$name;

        return $this;
    }


}