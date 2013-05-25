<?php
namespace Common\View\Helper;

use Zend\Stdlib\DateTime;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Helper\FlashMessenger;

/**
 * Class Messsages
 *
 * @package Job\View\Helper
 */
class TwitBootMessages extends AbstractHelper
{

    /**
     * Message types
     *
     * @var array
     */
    protected $types = array('', 'success', 'error', 'info');

    protected $icons = array(
        'icon-info-sign',
        'success' => 'icon-ok-sign',
        'error'   => 'icon-minus-sign'
    );

    /**
     * Format date to user friendly
     *
     * @param FlashMessenger $flashMessenger
     * @return string
     */
    public function __invoke(FlashMessenger $flashMessenger)
    {
        $output = '';
        foreach ($this->types as $type) {
            foreach ($flashMessenger->{'get' . ucfirst($type) . 'Messages'}() as $message) {
                $output .= $this->getAlert($type, $message);
            }
        }

        return $output;
    }

    /**
     * @param string $type
     * @param string $message
     * @return string
     */
    public function getAlert($type, $message)
    {
        $output = '
            <div class="alert alert-' . $type . '">
                <i class="' . $this->getIcon($type) . ' icon-white"></i>
                ' . $message . '
            </div>
            ';

        return $output;
    }

    /**
     * @param string $type
     * @return string
     */
    public function getIcon($type)
    {
        return empty($this->icons[$type]) ? $this->icons[0] : $this->icons[$type];
    }

}