<?php

namespace Bian\Platforms\SnapChat;

use Saloon\Enums\Method;
use Saloon\Http\SoloRequest;

class GenerateAccessToken extends SoloRequest
{
    protected Method $method = Method::POST;

    private string $clientId;

    private string $client_secret;

    private string $redirect_uri;

    public function __construct(private string $code)
    {
        $this->clientId = config('platforms.snapchat.client_id');
        $this->client_secret = config('platforms.snapchat.client_secret');
        $this->redirect_uri = config('platforms.snapchat.redirect_url');
    }

    public function resolveEndpoint(): string
    {
        return "https://accounts.snapchat.com/login/oauth2/access_token?grant_type=authorization_code&client_id={$this->clientId}&client_secret={$this->client_secret}&code={$this->code}&redirect_uri={$this->redirect_uri}";
    }
}
