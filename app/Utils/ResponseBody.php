<?php

namespace App\Utils;

use App\Utils\ResponseType;

class ResponseBody {
    public function __construct(public ResponseType $status = ResponseType::ERROR, public ?string $errorMessage = null,
                                public ?string $successMessage = null, public ?object $responseBody = null) {}
}
