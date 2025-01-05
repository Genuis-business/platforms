<?php

namespace Bian\Platforms\Google;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class GoogleConnector extends Connector
{
    public function __construct(
        private readonly string $accessToken,
        private readonly string $developerToken,
    ){}


    public function resolveBaseUrl(): string
    {
        return 'https://googleads.googleapis.com/v18';
    }

    protected function defaultAuth(): ?TokenAuthenticator
    {
        return new TokenAuthenticator($this->accessToken);
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
