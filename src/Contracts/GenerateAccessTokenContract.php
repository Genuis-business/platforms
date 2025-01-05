<?php

namespace Bian\Platforms\Contracts;

use Saloon\Contracts\Response;

interface GenerateAccessTokenContract
{
    public function createDtoFromResponse(Response $response): array;
} 