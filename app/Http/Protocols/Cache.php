<?php

namespace App\Http\Protocols;

interface Cache {
    public function exists(string $key);
    public function get(string $key);
    public function save(string $key, $data);
}