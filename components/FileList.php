<?php

namespace components;

class FileList {

    protected $path;

    public function __construct($path) {
        $this->path = $path;
    }

    public function get() : array {
        if (!is_readable($this->path)) {
            throw new \ErrorException('Каталог не найден или не доступен для чтения');
        }

        $files = scandir($this->path, SCANDIR_SORT_NONE);

        $list = [];

        foreach ($files as $fileName) {
            $isDir = is_dir($fileName);
            $file = [
                'name' => $fileName,
                'isDir' => (int) $isDir,
                'size' => $isDir ? null : filesize($fileName),
                'extension' => $isDir ? NULL : pathinfo($fileName)['extension'] ?? '',
                'mtime' => filemtime($fileName)
            ];
            $list[] = $file;
        }

        return $list;
    }
}