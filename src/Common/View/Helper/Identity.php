<?php
namespace Common\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Authentication\AuthenticationService;

/**
 * Class Identity
 * @package Application\View\Helper
 */
class Identity extends AbstractHelper
{

    /**
     * @var
     */
    protected $authService;

    public function __construct($authenticationService)
    {

        $this->setAuthService($authenticationService);
    }


    /**
     * @return User
     */
    public function __invoke()
    {
        return $this->getAuthService();
    }

    /**
     * @return AuthenticationService
     */
    public function getAuthService()
    {
        return $this->authService;
    }

    /**
     * @param AuthenticationService $authService
     * @return Identity
     */
    public function setAuthService($authService)
    {
        $this->authService = $authService;
        return $this;
    }
}
