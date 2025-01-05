<?php

namespace Bian\Platforms\Google;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\SoloRequest;
use Saloon\Traits\Body\HasFormBody;
use Saloon\Traits\Plugins\AcceptsJson;

class GenerateAccessToken extends SoloRequest implements HasBody
{
    use HasFormBody;
    use AcceptsJson;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $clientId,
        private readonly string $clientSecret,
        private readonly string $code,
        private readonly string $redirectUri,
    ) {}

    public function resolveEndpoint(): string
    {
        return 'https://oauth2.googleapis.com/token';
    }

    protected function defaultBody(): array
    {
        return [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'code' => $this->code,
            'redirect_uri' => $this->redirectUri,
            'grant_type' => 'authorization_code',
        ];
    }
}
