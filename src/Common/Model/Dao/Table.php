<?php
namespace Common\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Common\Model\Dao\Exception\Table\NoTableName;

abstract class Table implements DaoInterface
{

    /**
     * @var TableGateway
     */
    protected $_tableGateway;

    /**
     * @param TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->_tableGateway = $tableGateway;
    }

    /**
     * @return TableGateway
     */
    public function getTableGateway()
    {
        return $this->_tableGateway;
    }

    /**
     * @param TableGateway $tableGateway
     * @return DaoInterface
     */
    public function setTableGateway(TableGateway $tableGateway)
    {
        $this->_tableGateway = $tableGateway;
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
     */
    public function setTableName($name)
    {
        $this->tableName = (string) $name;
    }


}