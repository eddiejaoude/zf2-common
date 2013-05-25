<?php
namespace Common\Model\Service;

use Common\Model\Mapper\MapperInterface as Mapper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class Core
 *
 * @package Job\Model\Service
 */
abstract class Core implements ServiceLocatorAwareInterface
{
    /**
     * @var Mapper
     */
    protected $_mapper;

    /**
     * @var ServiceLocatorInterface
     */
    protected $services;

    /**
     * @param Mapper $mapper
     */
    public function __construct(Mapper $mapper = null)
    {
        $this->setMapper($mapper);
    }

    /**
     * @return Mapper
     */
    public function getMapper()
    {
        return $this->_mapper;
    }

    /**
     * @param Mapper $mapper
     * @return Core
     */
    public function setMapper(Mapper $mapper)
    {
        $this->_mapper = $mapper;
        return $this;
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->services = $serviceLocator;
    }

    /**
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->services;
    }

}