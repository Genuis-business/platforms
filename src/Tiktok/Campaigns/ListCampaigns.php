<?php

namespace Bian\Platforms\Tiktok\Campaigns;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ListCampaigns extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::GET;

    public function __construct(private string $advertiserId) {}

    public function resolveEndpoint(): string
    {
        return '/campaign/get';
    }

    protected function defaultBody(): array
    {
        return [
            'advertiser_id' => $this->advertiserId,
            'filtering' => [
                'secondary_status' => 'CAMPAIGN_STATUS_ENABLE',
            ],
        ];
    }
}
