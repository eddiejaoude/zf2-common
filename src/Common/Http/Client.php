<?php
namespace Common\Http;

use Zend\Http\Client as ZendClient;
use Zend\Http\Request;
use Zend\Http\Response;
use Application\Model\Service\Audit;

/**
 * Class Client
 *
 * @package Common\Http
 */
class Client extends ZendClient
{

    /**
     * @var Audit
     */
    private $audit;

    /**
     * Send HTTP request
     *
     * @param  Request $request
     *
     * @throws \Exception
     * @return Response
     */
    public function send(Request $request = null)
    {
        $response = parent::send($request);

        $response = json_decode($response->getContent(), true);

        if (is_null($response) || 401 == $response['Response']['Code']) {
            throw new \Exception('NCC API Authentication Failure. Please logout & login, then try again.');
        }

        $this->getAudit()->save($this);

        return $response;
    }

    /**
     * @return Audit
     */
    public function getAudit()
    {
        return $this->audit;
    }

    /**
     * @param Audit $audit
     *
     * @return $this
     */
    public function setAudit(Audit $audit)
    {
        $this->audit = $audit;

        return $this;
    }
}