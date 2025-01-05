<?php

namespace Bian\Platforms\X;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCampaigns extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $accountId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/accounts/{$this->accountId}/campaigns";
    }

    protected function defaultQuery(): array
    {
        return [
            'with_deleted' => false,
            'count' => 1000,
            'sort_by' => ['created_at-desc'],
        ];
    }

    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json();
        $campaigns = $data['data'] ?? [];

        return array_map(function ($campaign) {
            return [
                'id' => $campaign['id'],
                'name' => $campaign['name'],
                'status' => $campaign['status'],
                'objective' => $campaign['objective'] ?? null,
                'start_time' => $campaign['start_time'] ?? null,
                'end_time' => $campaign['end_time'] ?? null,
                'daily_budget_amount_local_micro' => $campaign['daily_budget_amount_local_micro'] ?? null,
                'total_budget_amount_local_micro' => $campaign['total_budget_amount_local_micro'] ?? null,
                'created_at' => $campaign['created_at'],
                'updated_at' => $campaign['updated_at'],
            ];
        }, $campaigns);
    }
} 