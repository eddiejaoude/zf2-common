<?php
namespace Common\View\Helper;

use Zend\Stdlib\DateTime;
use Zend\View\Helper\AbstractHelper;

/**
 * Class Date
 * @package Job\View\Helper
 */
class Date extends AbstractHelper
{

    /**
     * Format date to user friendly
     *
     * @param string $date
     * @return string
     */
    public function __invoke($date)
    {
        if (empty($date) || '0000-00-00 00:00:00' == $date) {
            return '---';
        }

        $datetime = new \DateTime($date);
        $friendly = $datetime->format('M \'y');
        return $friendly;
    }
}