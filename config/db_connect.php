<?php


$type     = 'mysql';
$server   = '<<<YOUR_REMOTE_IP_HERE>>>';         
$DB       = '<<<CPANELUSER_DATABASENAME>>>';      
$port     = 3306;                                 
$charset  = 'utf8mb4';

$username = '<<<CPANELUSER_DBUSERNAME>>>';        
$password = '<<<DBUSER_PASSWORD>>>';              

$dsn = "$type:host=$server;dbname=$DB;port=$port;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
    PDO::ATTR_EMULATE_PREPARES   => false,                  
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    throw $e;
}
