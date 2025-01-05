<?php

namespace Bian\Platforms\Meta;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetCampaigns extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $adAccountId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/act_{$this->adAccountId}/campaigns";
    }
} 