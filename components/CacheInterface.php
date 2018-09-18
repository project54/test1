<?php

namespace components;

interface CacheInterface {

    public function get(string $key) : string;
    public function set(string $key, string $data) : void;
    public function flush() : void;
}