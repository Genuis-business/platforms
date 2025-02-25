<?php

namespace Bian\Platforms\SnapChat\Campaigns;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetCampaignStats extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private string $campaignId,
        private string $startDate = '',
        private string $endDate = '',
        private string $granularity = 'TOTAL'
    ) {}

    public function resolveEndpoint(): string
    {
        return "/campaigns/{$this->campaignId}/stats";
    }

    protected function defaultQuery(): array
    {
        return [
            'fields' => implode(',', [
                'spend',
                'impressions',
                'swipes',
            ]),
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'granularity' => $this->granularity,
        ];
    }
} 