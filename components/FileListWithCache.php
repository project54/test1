<?php

namespace components;

class FileListWithCache extends FileList {

    protected $cache;

    public function __construct(string $path, CacheInterface $cache) {
        parent::__construct($path);
        $this->cache = $cache;
    }

    public function get() : array {
        $list = $this->getFromCache();

        if (!$list) {
            $list = parent::get();
            $this->setCache($list);
        }
        return $list;
    }

    public function flushCache() : void {
        $this->cache->flush();
    }

    private function getFromCache() : array {
        $cashe = $this->cache->get($this->path);
        return $cashe ? json_decode($cashe, true) : [];
    }

    private function setCache($list) : void {
        $this->cache->set($this->path, json_encode($list));
    }
}