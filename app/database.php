<?php

class Database {
    // Database connection properties
    private $host = 'localhost';
    private $db_name = 'vintage_vault';
    private $username = 'root';
    private $password = '';

    // This will hold our single database connection
    private $connection;

    // This will run when we create a new Database object
    public function __construct() {
        // Data Source Name (DSN) for the connection
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        
        // Options for the PDO connection
        $options = [
            PDO::ATTR_PERSISTENT => true, // Keeps the connection open
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // The important one for error reporting!
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Get results as an associative array
        ];

        // Create the one and only PDO instance
        try {
            $this->connection = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            // If connection fails, stop everything and show the error
            die('Connection Failed: ' . $e->getMessage());
        }
    }

    // Our simple, powerful, all-in-one query method
    public function query($statement, $params = []) {
        try {
            // Prepare the statement
            $stmt = $this->connection->prepare($statement);
            
            // Execute the statement with the parameters
            $stmt->execute($params);
            
            // Return the statement object so we can get results if we need them
            return $stmt;
        } catch (PDOException $e) {
            // If the query fails, stop everything and show the error
            die('Query Failed: ' . $e->getMessage());
        }
    }
}

?>