<?php
namespace CommonTest\View\Helper;

use Common\View\Helper\Date;
use PHPUnit_Framework_TestCase;

/**
 * Class DateTest
 *
 * @package CommonTest\View\Helper
 */
class DateTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Zend\View\Helper\AbstractHelper
     */
    protected $helper;

    public function setUp()
    {
        $this->helper = new Date();
    }

    public function testObjectInstance()
    {
        $this->assertInstanceOf('Common\View\Helper\Date', $this->helper);
    }

    public function testIsCallable()
    {
        $this->assertTrue(is_callable($this->helper));
    }

    public function testEmpty()
    {
        $helper = new Date();
        $this->assertEquals('---', $helper(''));
    }

    public function testZero()
    {
        $helper = new Date();
        $this->assertEquals('---', $helper('0000-00-00 00:00:00'));
    }

    public function testFriendly()
    {
        $helper = new Date();
        $this->assertEquals('12:00am on Friday 1st January 2010', $helper('2010-01-01 00:00:00'));
    }

}