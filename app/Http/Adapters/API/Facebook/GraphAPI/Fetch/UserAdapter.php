<?php

namespace App\Http\Adapters\API\Facebook\GraphAPI\Fetch;

use Crypto\API\Facebook\GraphAPI\Fetch\UserPort;
use Crypto\Connection\Facebook\GraphAPI\AccessTokenPort;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

final class UserAdapter implements UserPort
{
    private AccessTokenPort $tokenPort;

    public function __construct(AccessTokenPort $tokenPort)
    {
        $this->tokenPort = $tokenPort;
    }

    /**
     * @return array [
     *     'name' => 'string',
     *     'picture' => [
     *         'data' => [
     *             'height' => 720,
     *             'is_silhouette' => false,
     *             'url' => 'string',
     *             'width' => 720
     *         ]
     *     ],
     *     'id' => 'string'
     * ]
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function fetch(): array
    {
        $response = $this->request($this->getParameters());

        return json_decode(
            $response->getBody()->getContents(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    /**
     * Get this user profile API
     * @param array $parameters
     * @return ResponseInterface
     * @throws GuzzleException
     */
    private function request(array $parameters): ResponseInterface
    {
        $client = new Client(['base_uri' => config('services.facebook.graph_base_url')]);
        $apiVersion = '/' . config('services.facebook.graph_version');
        $path = '/me';

        return $client->request(
            'GET',
            "$apiVersion$path",
            [
                'query' => $parameters,
            ]
        );
    }

    private function getParameters(): array
    {
        $parameters = [
            'name',
            'picture.width(720).height(720)',
        ];
        $token = $this->tokenPort->get();

        return [
            'fields' => implode(',', $parameters),
            'access_token' => $token !== null ? $token->getValue() : null,
        ];
    }
}
