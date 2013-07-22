<?php
namespace Common\View\Helper;

use Zend\Stdlib\DateTime;
use Zend\View\Helper\AbstractHelper;

/**
 * Class Duration
 * @package Common\View\Helper
 */
class Duration extends AbstractHelper
{

    /**
     * Format duration to user friendly
     *
     * @param int $seconds
     * @return string
     */
    public function __invoke($seconds)
    {
        if (empty($seconds)) {
            return '---';
        }

        $datetime = new \DateTime('@' . $seconds);
        $duration['day'] = $datetime->format('z');
        $duration['hour'] = $datetime->format('G');
        $duration['minute'] = $datetime->format('i');
        $duration['second'] = $datetime->format('s');

        $friendly = '';
        foreach ($duration as $unit => $value) {
            if (!empty($value)) {
                $friendly .= $value . ' ' . $unit;
                $friendly .= $value > 1 ? 's, ' : ', ';
            }
        }

        return $friendly;
    }
}