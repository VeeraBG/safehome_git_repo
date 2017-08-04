<?php  
 class dbConnect {  
        function __construct() {  
	//	echo "hello";
           
		//	echo DB_DATABSE;
            $conn = mysql_connect("localhost", "root", "") or die(mysql_error());
          $lkj=  mysql_select_db("rushfuqn_safehome", $conn) or die(mysql_error());
            if(!$conn)// testing the connection  
            {  
                die ("Cannot connect to the database");  
            }   
            return $lkj;  
        }  
        public function Close(){  
            mysql_close();  
        }  
    }  
	  
?>

