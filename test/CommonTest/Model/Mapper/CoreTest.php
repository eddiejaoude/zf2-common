<?php
namespace CommonTest\Model\Mapper;

use PHPUnit_Framework_TestCase;
use Common\Model\Mapper\Core;

/**
 * Class CoreTest
 *
 * @package CommonTest\Model\Mapper
 */
class CoreTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Common\Model\Dao\Table
     */
    protected $dao;

    /**
     * @var \Common\Model\Mapper\Core
     */
    protected $mapper;

    public function setUp()
    {
        $this->dao = $this->getMock('Common\Model\Dao\Table', array(), array(), '', false);
        $this->mapper          = $this->getMockForAbstractClass(
            'Common\Model\Mapper\Core',
            array($this->dao),
            '',
            true
        );
    }

    public function testObjectInstance()
    {
        $this->assertInstanceOf('Common\Model\Mapper\Core', $this->mapper);
        $this->assertEquals($this->dao, $this->mapper->getDao());
    }

    public function testSetGetDao()
    {
        $this->assertInstanceOf('Common\Model\Mapper\Core', $this->mapper->setDao($this->dao));
        $this->assertEquals($this->dao, $this->mapper->getDao());
    }

    /**
     * @expectedException \Common\Model\Mapper\Exception\NotFound
     */
    public function testGetDaoThrowsException()
    {
        $mapper = $this->getMockForAbstractClass('Common\Model\Mapper\Core');
        $mapper->getDao();
    }


}