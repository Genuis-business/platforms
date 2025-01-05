<?php

namespace Bian\Platforms\SnapChat;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetOrganizationAdsAccount extends Request
{
    protected Method $method = Method::GET;

    public function __construct(private string $organizationId) {}

    public function resolveEndpoint(): string
    {
        return "/organizations/{$this->organizationId}/adaccounts";
    }

    protected function defaultBody(): array
    {
        return [];
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            //'Authorization' => 'Bearer ',
        ];
    }
}
