<?php
namespace Common\View\Helper;

use Zend\Stdlib\DateTime;
use Zend\View\Helper\AbstractHelper;

/**
 * Class Date
 * @package Common\View\Helper
 */
class Date extends AbstractHelper
{

    /**
     * Format date to user friendly
     *
     * @param $datetime
     *
     * @internal param string $date
     * @return string
     */
    public function __invoke($datetime)
    {
        if (empty($datetime) || '0000-00-00 00:00:00' == $datetime) {
            return '---';
        }

        if (!$datetime instanceof \DateTime) {
            $datetime = new \DateTime($datetime);
        }
        $friendly = $datetime->format('g:ia \o\n l jS F Y');
        return $friendly;
    }
}