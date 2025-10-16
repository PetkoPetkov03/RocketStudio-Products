<?php

namespace App\Utils;

enum ResponseType: string {
    case SUCCESS = 'success';
    case ERROR = 'error';
}
