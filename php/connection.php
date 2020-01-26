<?php
	final class database {
	    private static $instance = NULL;
	    
	    private $pdo_base;
	   	private $pdo_tpm;
	    private $all_pdo = array();

	    private function __construct() {
	        try {
	            // $db = new PDO('mysql:host=85.184.248.64;dbname=sct_hr', 'root', 'plc-db');
	            $db = new PDO('mysql:host=localhost;dbname=sct_hr', 'root', '');
			    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	        } catch(PDOException $e) {
	            echo $e->getmessage();
	            die();
	        }

	        $this->pdo_sct_hr = $db;
	        $this->all_pdo = array(
	        	'pdo_sct_hr' => $this->pdo_sct_hr,
	        	
	        );
	    }
	    public static function getInstance() {
	        static $instance = null;
	        if (self::$instance === NULL) {
	            $instance = new database();
	        }
	        return $instance;
	    }
	    function getConnection(){
	        return $this->all_pdo;
	    }
	}
?>