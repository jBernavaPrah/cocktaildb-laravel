<?php


namespace JBernavaPrah\CocktailDB;

use GuzzleHttp\Client as HttpClient;

class Client
{

    use
        Actions\Drink,
        Actions\Ingredient;

    /**
     * The Forge API Key.
     *
     * @var string
     */
    public $apiKey;

    /**
     * The Guzzle HTTP Client instance.
     *
     * @var HttpClient
     */
    public $client;

    /**
     * Number of seconds a request is retried.
     *
     * @var int
     */
    public $timeout = 30;


    /**
     * Create a new Forge instance.
     *
     * @param string $apiKey
     * @param HttpClient|null $client
     */
    public function __construct(?string $apiKey = '1', HttpClient $client = null)
    {

        $this->setApiKey($apiKey);

        $this->setClient($client ?: new HttpClient([
            'base_uri' => 'https://www.thecocktaildb.com/api/json/v1/' . $this->apiKey . "/",
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ]));
    }

    public function setClient(HttpClient $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Set the api key and setup the guzzle request object
     *
     * @param string $apiKey
     * @return $this
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @param $uri
     * @param array $query
     * @return string
     * @throws \Exception
     */
    private function get($uri, $query = [])
    {
        $response = $this->client->request('GET', $uri, ['query' => $query]);

        if ($response->getStatusCode() != 200) {
            throw new \Exception($response->getBody());
        }

        $responseBody = (string)$response->getBody();

        return json_decode($responseBody, true) ?: $responseBody;

    }

}
