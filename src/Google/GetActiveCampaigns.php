<?php

namespace Bian\Platforms\Google;

use Saloon\Enums\Method;
use Saloon\Http\Request;


class GetActiveCampaigns extends Request
{
    public Method $method = Method::GET;

    public function __construct(
        private readonly string $customerId,
    ){}

    public function resolveEndpoint(): string
    {
        return "/customers/{$this->customerId}/googleAds:search";
    }
}
