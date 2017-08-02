<?php

// Connects to the database
function db_connect() {
	// Defines connection as static variable to avoid multiple connections
	static $connection;

	// Tests and connects connection
	if(!isset($connection)) {
		// Loads configuration file
		$config = parse_ini_file("/kanji2000.ini");
		// Creates connection
		//$connection = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", $config["b13b2e44efc2d0"], $config["d088ff6f"], $config["heroku_9685adbe3cfbf48"]);
		$connection = mysqli_connect("localhost", $config["dbusername"], $config["dbpassword"], $config["dbname"]);
		$connection->set_charset("utf8");
	}

	// Checks connection
	if ($connection === false) {
	    return mysqli_connect_error();
	}

	return $connection;
}

// Sends SQL query to database
function db_query($query) {
	// Connect to the database
	$connection = db_connect();
	// Query the database
	$result = mysqli_query($connection, $query);

	return $result;
}

// Return database error message
function db_error() {
	$connection = db_connect();
	return mysqli_error($connection);
}

// Use this for SQL select queries
function db_select($query) {
    $rows = array();
    $result = db_query($query);

    // If query failed, return `false`
    if($result === false) {
        return false;
    }

    // If query was successful, retrieve all the rows into an array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Use this when you add variables to SQL query
function db_quote($value) {
    $connection = db_connect();
    return "'" . mysqli_real_escape_string($connection,$value) . "'";
}

?>