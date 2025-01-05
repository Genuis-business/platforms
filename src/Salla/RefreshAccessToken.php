<?php

namespace Bian\Platforms\Salla;

use Saloon\Enums\Method;
use Saloon\Http\SoloRequest;

class RefreshAccessToken extends SoloRequest
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/oauth2/token';
    }
}
