<?php

namespace Bian\Platforms\Meta;

use Bian\Platforms\Contracts\GenerateAccessTokenContract;
use Saloon\Http\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GenerateAccessToken extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $code
    ) {}

    public function resolveEndpoint(): string
    {
        return '/oauth/access_token';
    }

    protected function defaultQuery(): array
    {
        return [
            'client_id' => config('platforms.meta.client_id'),
            'client_secret' => config('platforms.meta.client_secret'),
            'redirect_uri' => config('platforms.meta.redirect_url'),
            'code' => $this->code,
        ];
    }
}
