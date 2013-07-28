<?php
namespace Common\View\Helper;

use Zend\Stdlib\DateTime;
use Zend\View\Helper\AbstractHelper;

/**
 * Class ShortenText
 * @package Common\View\Helper
 */
class ShortenText extends AbstractHelper
{

    /**
     * Shorten text to a selected size
     *
     * @param string $text
     * @param int    $length
     * @param string $divider
     * @return string
     */
    public function __invoke($text, $length = 50, $divider = '...')
    {
        if (strlen($text) < $length) {
            return $text;
        }

        $halfPoint = $length / 2;
        $shorterText = substr($text, 0, $halfPoint) . '...' . substr($text, -$halfPoint, strlen($text));

        return $shorterText;
    }
}