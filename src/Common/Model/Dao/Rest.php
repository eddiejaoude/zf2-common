<?php
namespace Common\Model\Dao;

use Common\Model\Dao\Exception\Rest\ClientNotFound;
use Zend\Http\Client;

/**
 * Class Rest
 *
 * @package Common\Model\Dao
 */
abstract class Rest implements DaoInterface
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client = null)
    {
        if (!empty($client)) {
            $this->setClient($client);
        }
    }

    /**
     * @throws Exception\Rest\ClientNotFound
     * @return Client
     */
    public function getClient()
    {
        if (empty($this->client)) {
            throw new ClientNotFound('Client required, use $dao->setClient($client)');
        }

        return $this->client;
    }

    /**
     * @param Client $client
     * @return DaoInterface
     */
    public function setClient(Client $client)
    {
        $this->client = $client;

        return $this;
    }

}