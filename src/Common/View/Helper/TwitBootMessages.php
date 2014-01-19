<?php
namespace Common\View\Helper;

use Zend\Stdlib\DateTime;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Helper\FlashMessenger;

/**
 * Class Messages
 *
 * @package Common\View\Helper
 */
class TwitBootMessages extends AbstractHelper
{

    /**
     * @param FlashMessenger $flashMessenger
     * @return string
     */
    public function __invoke(FlashMessenger $flashMessenger)
    {
        $flashMessenger->setMessageOpenFormat('<div%s><ul><li>')
            ->setMessageSeparatorString('</li><li>')
            ->setMessageCloseString('</li></ul></div>');

        return $flashMessenger;
    }
}
