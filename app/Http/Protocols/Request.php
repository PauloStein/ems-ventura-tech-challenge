<?php

namespace App\Http\Protocols;

interface Request {
    public function get(string $url);
}