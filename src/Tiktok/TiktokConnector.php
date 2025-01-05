<?php

namespace Bian\Platforms\Tiktok;

use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Http\Connector;

class TiktokConnector extends Connector
{
    public function __construct(
        private ?string $accessToken = null,
    ) {}

    public function resolveBaseUrl(): string
    {
        return 'https://business-api.tiktok.com/open_api/v1.3';
    }

    protected function defaultAuth(): ?HeaderAuthenticator
    {
        return $this->accessToken === null ? null : new HeaderAuthenticator($this->accessToken, 'Access-Token');
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }
}
