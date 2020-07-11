<?php

namespace Tests\Feature\UseCase\API\Facebook\GraphAPI;

use Crypto\API\Facebook\GraphAPI\Fetch\UserPort;
use Crypto\API\Facebook\GraphAPI\MyProfileUseCase;
use Tests\TestCase;

class MyProfileTest extends TestCase
{

    /**
     * @test
     */
    public function JSONのフォーマットが正しい(): void
    {
        $adapter = new class implements UserPort {
            public function fetch(): array
            {
                return [
                    'name' => 'string',
                    'picture' => [
                        'data' => [
                            'height' => 720,
                            'is_silhouette' => false,
                            'url' => 'string',
                            'width' => 720,
                        ],
                    ],
                    'id' => 'string',
                ];
            }
        };
        $useCase = new MyProfileUseCase($adapter);
        $actual = $useCase->get();
        $expect = [
            'name' => 'string',
            'picture' => [
                'data' => [
                    'height' => 720,
                    'is_silhouette' => false,
                    'url' => 'string',
                    'width' => 720,
                ],
            ],
            'id' => 'string',
        ];
        self::assertSame($expect, $actual);
    }
}
