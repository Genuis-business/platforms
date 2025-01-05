<?php

namespace Bian\Platforms\SnapChat;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class SnapChatConnector extends Connector
{
    public function __construct(
        private ?string $accessToken = null,
    ) {}

    public function resolveBaseUrl(): string
    {
        return 'https://adsapi.snapchat.com/v1';
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
