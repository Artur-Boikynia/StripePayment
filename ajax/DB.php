<?php
//namespace app\ajax;

use PDO;
class DB
{
    private ?PDO $connection = null;
    
    
    public function __construct(string $host, string $user, string $password, string $db)
    {
        $this->connection = new PDO("mysql:dbname={$db};host={$host};charset=UTF8", $user, $password);
    }
    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}

