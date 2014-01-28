<?php
namespace Common\View\Helper;

use Zend\Stdlib\DateTime;
use Zend\View\Helper\AbstractHelper;

/**
 * Class Nvd3
 *
 * @package Common\View\Helper
 */
class Nvd3 extends AbstractHelper
{

    private $data = array();

    /**
     * @param array  $data
     *
     * @return array
     */
    public function __invoke(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param string $x
     * @param array  $y
     *
     * @return array
     */
    public function line($x, array $y)
    {
        $result = array(array());
        foreach ($this->data as $item) {
            foreach ($y as $lineNo => $line) {
                $result[$lineNo]['key'] = $line;
                $result[$lineNo]['values'][] = array(
                    'x' => $item[$x],
                    'y' => $item[$line],
                );
            }
        }

        return $result;
    }

    /**
     * @param $x
     * @param $y
     *
     * @return array
     */
    public function histogram($x, $y)
    {
        $result = array(array());
        foreach ($this->data as $item) {
                $result[0]['values'][] = array(
                    'label' => (string) $item[$x] . 's',
                    'value' => $item[$y],
                );
            }

        return $result;
    }

    /**
     * @param $x
     * @param $y
     *
     * @return array
     */
    public function pie($x, $y)
    {
        $result = array();
        foreach ($this->data as $item) {
            $result[] = array(
                'label' => (string) $item[$x],
                'value' => $item[$y],
            );
        }

        return $result;
    }
}