<?php
namespace Common\Model\Service;

use Common\Model\Mapper\MapperInterface as Mapper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Common\Model\Service\Exception\NotFound;

/**
 * Class Core
 *
 * @package Common\Model\Service
 */
abstract class Core implements ServiceLocatorAwareInterface
{
    /**
     * @var Mapper
     */
    protected $mapper;

    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    /**
     * @param Mapper|null $mapper
     */
    public function __construct(Mapper $mapper = null)
    {
        if (!empty($mapper)) {
            $this->setMapper($mapper);
        }
    }

    /**
     * @throws NotFound
     * @return Core
     */
    public function getMapper()
    {
        if (empty($this->mapper)) {
            throw new NotFound('Mapper not found. Use $service->setMapper($mapper)');
        }

        return $this->mapper;
    }

    /**
     * @param Mapper $mapper
     * @return Core
     */
    public function setMapper(Mapper $mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return Core
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;

        return $this;
    }

    /**
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

}