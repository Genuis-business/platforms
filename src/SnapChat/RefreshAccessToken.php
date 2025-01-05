<?php

namespace Bian\Platforms\SnapChat;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\SoloRequest;
use Saloon\Traits\Body\HasJsonBody;

class RefreshAccessToken extends SoloRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    private string $client_id;

    private string $client_secret;

    private string $redirect_uri;

    public function __construct(private string $refresh_token)
    {
        $this->client_id = config('platforms.snapchat.client_id');
        $this->client_secret = config('platforms.snapchat.client_secret');
        $this->redirect_uri = config('platforms.snapchat.redirect_url');
    }

    public function resolveEndpoint(): string
    {
        return 'https://accounts.snapchat.com/login/oauth2/access_token';
    }

    protected function defaultBody(): array
    {
        return [
            'refresh_token' => $this->refresh_token,
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'grant_type' => 'refresh_token',
        ];
    }
}
