<?php
namespace CommonTest\Model\Dao;

use PHPUnit_Framework_TestCase;
use Zend\Http\Client;

/**
 * Class TableTest
 *
 * @package CommonTest\Model\Dao
 */
class RestTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Zend\Http\Client
     */
    protected $client;

    /**
     * @var \Common\Model\Dao\Rest
     */
    protected $dao;

    public function setUp()
    {
        $this->client = $this->getMock('Zend\Http\Client', array(), array(), '', false);
        $this->dao          = $this->getMockForAbstractClass(
            'Common\Model\Dao\Rest',
            array($this->client),
            '',
            true
        );
    }

    public function testObjectInstance()
    {
        $this->assertInstanceOf('Common\Model\Dao\Rest', $this->dao);
        $this->assertEquals($this->client, $this->dao->getClient());
    }

    public function testSetGetClient()
    {
        $this->assertInstanceOf('Common\Model\Dao\Rest', $this->dao->setClient($this->client));
        $this->assertEquals($this->client, $this->dao->getClient());
    }

    /**
     * @expectedException \Common\Model\Dao\Exception\Rest\ClientNotFound
     */
    public function testGetClient()
    {
        $dao = $this->getMockForAbstractClass('Common\Model\Dao\Rest');
        $this->assertEquals($this->client, $dao->getClient());
    }


}