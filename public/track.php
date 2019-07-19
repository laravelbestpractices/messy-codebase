<?php

require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create('../');
$dotenv->load();

$vote_method = isset($_GET['vote_method']) ? $_GET['vote_method'] : 'up';
$photoID = isset($_GET['photoID']) ? $_GET['photoID'] : 0;


if($photoID > 0)
{
    $host =  getenv('DB_HOST');
    $db   = getenv('DB_DATABASE');
    $user = getenv('DB_USERNAME');
    $pass = getenv('DB_PASSWORD');
    
    $dsn = "mysql:host=$host;dbname=$db";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        
        $pdo = new PDO($dsn, $user, $pass, $options);
        
        if($vote_method == 'up')
            $sql = "UPDATE Pictures SET Votes = Votes + 1 WHERE id = '$photoID'";
         else
            $sql = "UPDATE Pictures SET Votes = Votes - 1 WHERE id = '$photoID'";

        $res = $pdo->exec($sql);
        header('Location: ' . getenv('APP_URL'));
    } catch (\PDOException $e) {
         throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}
