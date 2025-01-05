<?php

namespace Bian\Platforms\Meta;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class MetaConnector extends Connector
{
    public function __construct(
        private ?string $accessToken = null,
    ) {}

    public function resolveBaseUrl(): string
    {
        return 'https://graph.facebook.com/v21.0';
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
