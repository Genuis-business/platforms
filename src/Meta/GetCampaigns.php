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

    protected function defaultQuery(): array
    {
        return [
            'fields' => 'id,name,status,objective,daily_budget,lifetime_budget,start_time,end_time,buying_type,bid_strategy,created_time,updated_time,insights{impressions,reach,spend,clicks,ctr,cpc}',
        ];
    }
} 