<?php
class Database {
    private static $host;
    private static $dbname;
    private static $username;
    private static $password;
    private static $dsn;
    private static $db;

    //sets the database as an object
    public function __construct(){
        self::$host = getenv('SQL_HOST') ? getenv('SQL_HOST') : 'r4wkv4apxn9btls2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
        self::$dbname = getenv('SQL_DB') ? getenv('SQL_DB') : 'JawsDB';
        self::$username = getenv('SQL_USER') ? getenv('SQL_USER') : 'msbgywaq1t4h7vcw';
        self::$password = getenv('SQL_PW') ? getenv('SQL_PW') : 'vhv8gmngff4nc4yq';
        self::$dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$dbname;
    }

    //then gets the database object
    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                    self::$username,
                                    self::$password);
            } catch (PDOException $e) {
                $error_message = 'Database Error: ';
                $error_message .= $e->getMessage();
                include('view/error.php');
                exit();
            }
        }
        return self::$db;
    }
}

$database = new Database();
?>
