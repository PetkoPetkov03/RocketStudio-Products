<?php

namespace App\Utils;

class ResponseBody {
    public function __construct(public bool $error = false, public mixed $responseBody = null, public ?string $errorMessage = null) {}
}
