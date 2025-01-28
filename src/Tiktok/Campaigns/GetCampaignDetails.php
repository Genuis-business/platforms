<?php

namespace Bian\Platforms\Tiktok\Campaigns;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class GetCampaignDetails extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::GET;

    public function __construct(
        private string $advertiserId,
        private string $campaignId,
        private string $startDate,
        private string $endDate,
    ) {}

    public function resolveEndpoint(): string
    {
        return 'report/integrated/get';
    }

    protected function defaultBody(): array
    {
        return [
            'advertiser_id' => $this->advertiserId,
            "report_type" => "BASIC",
            "data_level" => "AUCTION_CAMPAIGN",
            "dimensions" => ["campaign_id"],
            "start_date" => $this->startDate,
            "end_date" => $this->endDate,
            "metrics" => ["spend", "impressions", "clicks", "ctr"],
        ];
    }
} 

