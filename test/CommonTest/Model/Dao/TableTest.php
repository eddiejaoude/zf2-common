<?php
namespace CommonTest\Model\Dao;

use PHPUnit_Framework_TestCase;
use Zend\Db\TableGateway\TableGateway;

/**
 * Class TableTest
 *
 * @package CommonTest\Model\Dao
 */
class TableTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Zend\Db\TableGateway\TableGateway
     */
    protected $tableGateway;

    /**
     * @var \Common\Model\Dao\Table
     */
    protected $dao;

    public function setUp()
    {
        $this->tableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array(), array(), '', false);
        $this->dao          = $this->getMockForAbstractClass(
            'Common\Model\Dao\Table',
            array($this->tableGateway),
            '',
            true
        );
    }

    public function testObjectInstance()
    {
        $this->assertInstanceOf('Common\Model\Dao\Table', $this->dao);
        $this->assertEquals($this->tableGateway, $this->dao->getTableGateway());
    }

    public function testSetGetTableName()
    {
        $name = ' testtablename';

        $this->assertInstanceOf('Common\Model\Dao\Table', $this->dao->setTableName($name));
        $this->assertEquals($name, $this->dao->getTableName());
    }

    /**
     * @expectedException \Common\Model\Dao\Exception\Table\NoTableName
     */
    public function testGetTableNameThrowsException()
    {
        $this->dao->getTableName();
    }

    public function testSetGetTableGateway()
    {
        $this->assertInstanceOf('Common\Model\Dao\Table', $this->dao->setTableGateway($this->tableGateway));
        $this->assertEquals($this->tableGateway, $this->dao->getTableGateway());
    }

    /**
     * @expectedException \Common\Model\Dao\Exception\Table\GatewayNotFound
     */
    public function testGetTableGateway()
    {
        $dao = $this->getMockForAbstractClass('Common\Model\Dao\Table');
        $this->assertEquals($this->tableGateway, $dao->getTableGateway());
    }


}