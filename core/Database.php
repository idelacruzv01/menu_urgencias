<?php

class Database {
    private $host = "localhost";
    private $dbname = "hospital_db";
    private $username = "root";
    private $password = "";

    public function getConnection() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        return new PDO($dsn, $this->username, $this->password, $options);
    }
}
