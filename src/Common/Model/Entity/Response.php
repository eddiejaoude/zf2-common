<?php
namespace Comon\Model\Entity;

use Traversable;
use IteratorAggregate;
use ArrayIterator;
use Common\Model\Entity\EntityInterface;

/**
 * Class Response
 *
 * @package Common\Model\Entity
 */
class Response implements IteratorAggregate
{

    /**
     * @var EntityInterface
     */
    private $data;

    /**
     * @return ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new ArrayIterator($this->getArrayCopy());
    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * @param EntityInterface $data
     * @return Response
     */
    public function setData(EntityInterface $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return EntityInterface
     */
    public function getData()
    {
        return $this->data;
    }
}
