<?php
/**
 * 
 */
class MySQLDB
{
	/*Variables of Connection*/
	private $host	= "localhost";
	private $user	= "root";
	private $pass	= "";
	private $db		= "demo";
	private $port	= "";

	private $conn;
	
	function __construct()
	{
		/*Database connection*/
		$this->conn 	= mysqli_connect($this->host,
										$this->user,
										$this->pass,
										$this->db);
		/*Connection validating*/
		if (mysqli_connect_errno()) {
			print "Error of connection to database.";
		} else {
			print("CLASS MySQLDB: Successful connection ")."<br>";
		}
		/*Charset validating*/
		if (mysqli_set_charset($this->conn, "utf8")) {
			print "CLASS MySQLDB: Charset is ".mysqli_character_set_name($this->conn)."<br>";
		} else {
			print "Error in the conversion of Charset Database";
			exit();
		}
	}
}
?>