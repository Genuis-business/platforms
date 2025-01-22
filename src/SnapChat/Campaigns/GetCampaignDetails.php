<?php

namespace Bian\Platforms\SnapChat\Campaigns;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetCampaignDetails extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private string $adsAccount,
        private string $campaignId
    ) {}

    public function resolveEndpoint(): string
    {
        return "/adaccounts/{$this->adsAccount}/campaigns/{$this->campaignId}";
    }
} 