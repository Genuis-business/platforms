<?php

namespace Bian\Platforms\SnapChat\Campaigns;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetCampaignStats extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private string $campaignId,
        private string $startTime,
        private string $endTime,
        private string $granularity = 'TOTAL'
    ) {}

    public function resolveEndpoint(): string
    {
        return "/campaigns/{$this->campaignId}/stats";
    }

    protected function defaultQuery(): array
    {
        return [
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'granularity' => $this->granularity,
            'fields' => implode(',', [
                'spend',
                'impressions',
                'swipes',
                'conversion_value',
            ]),
        ];
    }
} 