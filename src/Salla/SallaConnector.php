<?php

namespace Bian\Platforms\Salla;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class SallaConnector extends Connector
{
    public function __construct(
        private ?string $accessToken = null,
    ) {}

    public function resolveBaseUrl(): string
    {
        return 'https://api.salla.dev/admin/v2';
    }

    protected function defaultAuth(): ?TokenAuthenticator
    {
        return $this->accessToken === null ? null : new TokenAuthenticator($this->accessToken);
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
