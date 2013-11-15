<?php
namespace Common\Model\Entity;

use Traversable;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use IteratorAggregate;
use ArrayIterator;
use Common\Model\Entity\CollectionInterface;

/**
 * Class Response
 *
 * @package Common\Model\Entity
 */
class ResponseCollection implements InputFilterAwareInterface, IteratorAggregate
{

    /**
     * @var CollectionInterface
     */
    private $data;

    /**
     * @var int
     */
    private $total;

    /**
     * @var InputFilter
     */
    private $inputFilter;

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
        $data = get_object_vars($this);
        unset($data['inputFilter']);

        return $data;
    }

    /**
     * @param InputFilterInterface $inputFilter
     *
     * @return void|InputFilterAwareInterface
     * @throws \Exception
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    /**
     * @return InputFilter|InputFilterInterface
     */
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

    /**
     * @param CollectionInterface $data
     * @return ResponseCollection
     */
    public function setData(CollectionInterface $data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return CollectionInterface
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     * @return ResponseCollection
     */
    public function setTotal($total)
    {
        $this->total = (int) $total;
        return $this;
    }
}
