<?php

namespace Bian\Platforms\Salla;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\SoloRequest;
use Saloon\Traits\Body\HasFormBody;

class GenerateAuthAccessToken extends SoloRequest implements HasBody
{
    use HasFormBody;

    /**
     * Define the HTTP method
     */
    protected Method $method = Method::POST;

    /**
     * Constructor for the auth token request
     */
    public function __construct(
        private readonly string $clientId,
        private readonly string $clientSecret,
        private readonly string $code,
        private readonly string $redirectUri,
    ) {}

    /**
     * Define the endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return 'https://accounts.salla.sa/oauth2/token';
    }

    /**
     * Define the form data for the request
     */
    protected function defaultBody(): array
    {
        return [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => 'authorization_code',
            'code' => $this->code,
            'scope' => 'offline_access',
            'redirect_uri' => $this->redirectUri,
        ];
    }
}
