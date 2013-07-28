<?php
namespace CommonTest\Model\Service;

use PHPUnit_Framework_TestCase;
use Common\Model\Service\Core;

/**
 * Class CoreTest
 *
 * @package CommonTest\Model\Service
 */
class CoreTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var \Common\Model\Dao\Core
     */
    protected $dao;

    /**
     * @var \Common\Model\Mapper\Core
     */
    protected $mapper;

    /**
     * @var \Common\Model\Service\Core
     */
    protected $service;

    /**
     * @var \Zend\ServiceManager\ServiceLocatorInterface
     */
    protected $serviceLocator;

    public function setUp()
    {
        $this->dao     = $this->getMock('Common\Model\Dao\Table', array(), array(), '', false);
        $this->mapper  = $this->getMock('Common\Model\Mapper\Core', array(), array($this->dao), '', false);
        $this->service = $this->getMockForAbstractClass(
            'Common\Model\Service\Core',
            array($this->mapper),
            '',
            true
        );
    }

    public function testObjectInstance()
    {
        $this->assertInstanceOf('Common\Model\service\Core', $this->service);
        $this->assertEquals($this->mapper, $this->service->getMapper());
    }

    public function testSetGetMapper()
    {
        $this->assertInstanceOf('Common\Model\Service\Core', $this->service->setMapper($this->mapper));
        $this->assertEquals($this->mapper, $this->service->getMapper());
    }

    /**
     * @expectedException \Common\Model\Service\Exception\NotFound
     */
    public function testGetMapperThrowsException()
    {
        $mapper = $this->getMockForAbstractClass('Common\Model\Service\Core');
        $mapper->getMapper();
    }

    public function testSetGetServiceLocator()
    {
        $serviceLocator = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface', array(), array(), '', false);

        $this->assertInstanceOf('Common\Model\Service\Core', $this->service->setServiceLocator($serviceLocator));
        $this->assertEquals($serviceLocator, $this->service->getServiceLocator());
    }


}