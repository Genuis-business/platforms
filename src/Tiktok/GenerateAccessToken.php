<?php

namespace Bian\Platforms\Tiktok;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class GenerateAccessToken extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private string $authCode,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/oauth2/access_token';
    }

    protected function defaultBody(): array
    {
        return [
            'app_id' => config('platforms.tiktok.app_id'),
            'secret' => config('platforms.tiktok.secret'),
            'grant_type' => 'authorization_code',
            'auth_code' => $this->authCode,
        ];
    }
}
