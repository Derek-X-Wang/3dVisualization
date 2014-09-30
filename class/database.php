<?php

/**
 *  A class contain all database related method
 */
 
class database {
	

    private $user;
    private $psd;
    private $databasename;
	private $dbc;
	
		
	function __construct($user,$psd,$databasename)
	{
        $this -> user = $user;
        $this -> psd = $psd;
        $this -> databasename = $databasename;
		//Database Connection
		$this->dbc = mysqli_connect('localhost', $this -> user, $this -> psd, $this -> databasename) OR die('Could not connect because:'.mysqli_error());
		      		
	}
	
	// this method is a example
	public function data_user_example($id)
	{
		$q = "SELECT * FROM user WHERE email = '$id'";
		$r = mysqli_query($this->dbc, $q);
		
		$data = mysqli_fetch_assoc($r);
		
		return $data;
	}
	

	public function verifyPlaceID($id)
	{
		
		$q = "SELECT id FROM places WHERE BINARY id = '$id'";
		$r = mysqli_query($this->dbc, $q) or die(mysql_error($this->dbc) );

		if(mysqli_num_rows($r) == 1) {
		     // row found, do stuff...
		     return TRUE;
		} else {
		    // do other stuff...    
			return FALSE;
		}
	
	}

}

?>