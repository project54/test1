<?php

namespace components;

class DbCache implements CacheInterface {

    protected $dbh;
    protected $table;

    public function __construct(\PDO $dbh, $table = 'cache') {
        $this->dbh = $dbh;
        $this->table = $table;
    }

    public function getTable() : string {
        return $this->table;
    }

    public function get(string $key) : string {
        $sth = $this->dbh->prepare("SELECT `value` FROM {$this->getTable()} WHERE `key` = ?");
        $sth->execute([$key]);
        return $sth->fetchColumn();
    }

    public function set(string $key, string $value) : void {
        $sth = $this->dbh->prepare("
            INSERT INTO {$this->getTable()} (`key`, `value`) VALUES (?, ?)
            ON DUPLICATE KEY UPDATE `value` = VALUES(`value`);   
        ");
        $sth->execute([$key, $value]);
    }

    public function flush() : void {
        $this->dbh->exec("DELETE FROM {$this->getTable()}");
    }

}