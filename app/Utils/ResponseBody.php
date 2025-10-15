<?php

namespace App\Utils;

class ResponseBody {
    public function __construct(public bool $error = false, public ?string $errorMessage = null,
                                public ?string $successMessage = null, public ?object $responseBody = null) {}
}
