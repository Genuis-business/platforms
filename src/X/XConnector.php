<?php

namespace Bian\Platforms\X;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class XConnector extends Connector
{
    public function __construct(
        private readonly string $accessToken,
    ) {}

    public function resolveBaseUrl(): string
    {
        return 'https://api.x.com/2';
    }

    protected function defaultAuth(): TokenAuthenticator
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