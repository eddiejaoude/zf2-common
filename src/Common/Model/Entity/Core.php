<?php
namespace Common\Model\Entity;

/*
 * Entity core
 */
abstract class Core
{

    /**
     * @param array $validations
     * @return bool
     */
    public function isValid(array $validations = null)
    {
        $inputFilter = $this->getInputFilter()
            ->setData(
                $this->getArrayCopy()
            );

        if (!is_null($validations)) {
            $inputFilter->setValidationGroup($validations);
        }

        return $inputFilter->isValid();
    }
}
