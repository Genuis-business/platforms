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
    private readonly string $clientId;
    private readonly string $clientSecret;
    private readonly string $redirectUri;

    /**
     * Constructor for the auth token request
     */
    public function __construct(private readonly string $code)
    {
        $this->clientId = config('platforms.salla.client_id');
        $this->clientSecret = config('platforms.salla.client_secret');
        $this->redirectUri = config('platforms.salla.redirect_url');
    }

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
