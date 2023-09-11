<?php 
/**
 * Control of URI and process trigger
 * First parammeters: Control
 * Second parammeter: The Method
 * Next parammeters	: The parammeters.
 */
class Control
{
	
	function __construct()
	{
		#print "Hello world with MVC Design Pattern in PHP 8.";
		$url	= $this->separarURL();
		var_dump($url);
	}

	public function separarURL()
	{		
		$url = "";
		if (isset($_GET['url'])) {
			//deleting charact of the final
			$url = rtrim($_GET['url'], "/");
			$url = rtrim($_GET['url'], "\\");
			//Filter sanitize any characts
			$url = filter_var($url, FILTER_SANITIZE_URL);
			//Explode array
			$url = explode("/", $url);
		}
		return $url;
	}	
}