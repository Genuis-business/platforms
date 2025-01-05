<?php

namespace Bian\Platforms\X;

use Bian\Platforms\Contracts\GenerateAccessTokenContract;
use Saloon\Http\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GenerateAccessToken extends Request implements GenerateAccessTokenContract
{
    protected Method $method = Method::POST;

    public function __construct(
        protected string $code
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
            'redirect_uri' => config('platforms.x.redirect_url'),
            'code' => $this->code,
            'grant_type' => 'authorization_code',
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