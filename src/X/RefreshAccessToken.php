<?php

namespace Bian\Platforms\X;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class RefreshAccessToken extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        protected string $refreshToken
    ) {}

    public function resolveEndpoint(): string
    {
        return '/oauth2/token';
    }

    protected function defaultQuery(): array
    {
        return [
            'client_id' => config('platforms.x.client_id'),
            'client_secret' => config('platforms.x.client_secret'),
            'grant_type' => 'refresh_token',
            'refresh_token' => $this->refreshToken,
        ];
    }

    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json();
        
        return [
            'access_token' => $data['access_token'],
            'token_type' => $data['token_type'],
            'expires_in' => $data['expires_in'] ?? null,
            'refresh_token' => $data['refresh_token'] ?? null,
            'scope' => $data['scope'] ?? null,
        ];
    }
} 