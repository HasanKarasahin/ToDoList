<?php

class Connection
{

    private $connection;
    public static $instance;
    private $dbhost = '';
    private $dbname = '';
    private $dbuser = '';
    private $dbpass = '';

    private function __construct()
    {
        $data = $this->getConfigDataFromJsonFile();
        $this->dbhost = $data['dbhost'];
        $this->dbname = $data['dbname'];
        $this->dbport = $data['dbport'];
        $this->dbuser = $data['dbuser'];
        $this->dbpass = $data['dbpass'];

        $dsn = 'mysql:dbname='.$this->dbname.';host=127.0.0.1';
        $user = $this->dbuser;
        $password = $this->dbpass;

        $this->connection = new PDO($dsn, $user, $password);
    }

    public static function getInstance()
    {
        // instance tanımlı mı bakalım, değilse oluşturalım
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // dışarıdan kopyalanmasını engelledik
    private function __clone()
    {
    }

    // unserialize edilmesini engelledik
    private function __wakeup()
    {
    }

    // PDO bağlantısını döndürelim
    public function getConnection()
    {
        return $this->connection;
    }

    private function getConfigDataFromJsonFile()
    {
        $filename = __DIR__ . '/dbconfig.json';
        $json_b = array('sonuc' => -1);

        if (file_exists($filename)) {
            $string = file_get_contents($filename);
            return json_decode($string, true);
        }
        return $json_b;
    }

}