<?php

class MySQLdb 
	{

private $server = "localhost";
private $database_name = "charcuteriatocinos";
private $username = "root";
private $password = "";
private $table_name1 = "usuarios";
private $table_name2 = "ticket";
private $table_name3 = "proveedores";
private $table_name4 = "tarjetaCredit";
private $table_name5 = "refTicket";
private $table_name6 = "carrito";
private $table_name7 = "productos";
private $table_name8 = "pedidoProveedor";
private $connection;
private $tableFileds="";

	
		function __construct()
		{
			$this -> createDataBase();
			
			$this -> connectToServerDataBase();
			$this -> charset();

			$this->defineTableField1();
			$this->createTables($this->table_name1);
			
			$this->defineTableField2();
			$this->createTables($this->table_name2);

			$this->defineTableField3();
			$this->createTables($this->table_name3);


      $this->defineTableField4();
			$this->createTables($this->table_name4);
			
			$this->defineTableField5();
			$this->createTables($this->table_name5);

			$this->defineTableField6();
			$this->createTables($this->table_name6);

      		
			$this->defineTableField7();
			$this->createTables($this->table_name7);

			$this->defineTableField8();
			$this->createTables($this->table_name8);
			


			$this->insertProducts();
		}

	private function createDataBase(){
		$query = "CREATE DATABASE IF NOT EXISTS $this->database_name";
		$connectionTemp = mysqli_connect($this->server, $this->username, $this->password);
		$ok = mysqli_query($connectionTemp,$query);
		if ($ok) echo 'Create data bases OK-------------------------<br>';
		else echo 'Create Table: not Ok <br>';
		mysqli_close($connectionTemp);
	}
	
	private function connectToServerDataBase(){
		$this->connection = mysqli_connect($this->server, $this->username, $this->password, $this->database_name);
		if (mysqli_connect_errno()) die("Connect to data base: NOT OK"); 
			else echo 'Connect to data base :OK';
	}
 
	private function charset(){
		$ok =mysqli_set_charset($this->connection, "utf8");
		if ($ok)print("Charset: Ok <br>");
		else print ("Charset: not Ok <br>");		 
	}
   
    private function createTables($table_name){
      //- Crear una table
	    $query = "CREATE TABLE IF NOT EXISTS $this->database_name.$table_name($this->tableFileds) ENGINE = MYISAM";
	    $ok = mysqli_query($this->connection,$query);
	             if ($ok)  echo 'Creat Table:    Ok <br>';
	             else      echo 'Creat Table: not Ok <br>';

	  /*
MyISAM o InnoDB? Elige motor de almacenamiento MySQLSi:
Si necesitamos transacciones, claves foráneas y bloqueos, tendremos que escoger InnoDB. 
Por el contrario, escogeremos MyISAM en aquellos casos en los que predominen las consultas SELECT a la base de datos.

	  */
    }



	private function defineTableField1(){
		$this -> tableFileds="
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`Login` varchar(100) NOT NULL,
		`Password` varchar(200) NOT NULL,
		`Email` varchar(200) NOT NULL,
		 PRIMARY KEY (`id`)";
/*$this -> tableFileds="
		`id` int(11) NOT NULL,
		`name` varchar(100) NOT NULL,
		`surnames` varchar(100) NOT NULL,
		`email` varchar(200) NOT NULL,
		`address` varchar(150) NOT NULL,
		`city` varchar(100) NULL,
		`state` varchar(50) NOT NULL,
		`postalCode` varchar(10) NOT NULL,
		`country` varchar(100) NOT NULL,
		`password` varchar(200) NOT NULL";*/

	}
	private function defineTableField2(){
		$this -> tableFileds="
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`type` varchar(50) NOT NULL,
		`product` varchar(200) NOT NULL,
		`description` text  NOT NULL,
		`price` decimal(10,2) NOT NULL,
		`quantity` int(11) NOT NULL,
		`discount` decimal(10,2) NOT NULL,
		`Shipping` decimal(10,2) NOT NULL,
		`image` varchar(100) NOT NULL,
		`date` date NOT NULL,
		 PRIMARY KEY (`id`)";
	}

	private function defineTableField3(){
		$this -> tableFileds="
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`idUser` int(11) NOT NULL,
		`product` varchar(200) NOT NULL,
		`price` decimal(10,2) NOT NULL,
		`discount` decimal(10,2) NOT NULL,
		`Shipping` decimal(10,2) NOT NULL,
		`state` char(1) NOT NULL,
		`quantity` int(11) NOT NULL,
		`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		`PayerID` varchar(50) NOT NULL,
		 PRIMARY KEY (`id`)";
	}


  private function defineTableField4(){
		$this -> tableFileds="
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`Login` varchar(100) NOT NULL,
		`Password` varchar(200) NOT NULL,
		`Email` varchar(200) NOT NULL,
		 PRIMARY KEY (`id`)";
/*$this -> tableFileds="
		`id` int(11) NOT NULL,
		`name` varchar(100) NOT NULL,
		`surnames` varchar(100) NOT NULL,
		`email` varchar(200) NOT NULL,
		`address` varchar(150) NOT NULL,
		`city` varchar(100) NULL,
		`state` varchar(50) NOT NULL,
		`postalCode` varchar(10) NOT NULL,
		`country` varchar(100) NOT NULL,
		`password` varchar(200) NOT NULL";*/

	}
	private function defineTableField5(){
		$this -> tableFileds="
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`type` varchar(50) NOT NULL,
		`product` varchar(200) NOT NULL,
		`description` text  NOT NULL,
		`price` decimal(10,2) NOT NULL,
		`quantity` int(11) NOT NULL,
		`discount` decimal(10,2) NOT NULL,
		`Shipping` decimal(10,2) NOT NULL,
		`image` varchar(100) NOT NULL,
		`date` date NOT NULL,
		 PRIMARY KEY (`id`)";
	}

	private function defineTableField6(){
		$this -> tableFileds="
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`idUser` int(11) NOT NULL,
		`product` varchar(200) NOT NULL,
		`price` decimal(10,2) NOT NULL,
		`discount` decimal(10,2) NOT NULL,
		`Shipping` decimal(10,2) NOT NULL,
		`state` char(1) NOT NULL,
		`quantity` int(11) NOT NULL,
		`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		`PayerID` varchar(50) NOT NULL,
		 PRIMARY KEY (`id`)";
	}


  private function defineTableField7(){
		$this -> tableFileds="
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`type` varchar(50) NOT NULL,
		`product` varchar(200) NOT NULL,
		`description` text  NOT NULL,
		`price` decimal(10,2) NOT NULL,
		`quantity` int(11) NOT NULL,
		`discount` decimal(10,2) NOT NULL,
		`Shipping` decimal(10,2) NOT NULL,
		`image` varchar(100) NOT NULL,
		`date` date NOT NULL,
		 PRIMARY KEY (`id`)";
	}

	private function defineTableField8(){
		$this -> tableFileds="
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`idUser` int(11) NOT NULL,
		`product` varchar(200) NOT NULL,
		`price` decimal(10,2) NOT NULL,
		`discount` decimal(10,2) NOT NULL,
		`Shipping` decimal(10,2) NOT NULL,
		`state` char(1) NOT NULL,
		`quantity` int(11) NOT NULL,
		`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		`PayerID` varchar(50) NOT NULL,
		 PRIMARY KEY (`id`)";
	}



// public function functionVerifyRegister(){
// 	$Login   = $_POST["Login"];
// 	$Password= $_POST["Password"];
// 	$query = mysqli_query($this->connection, "SELECT * FROM $this->database_name.$this->table_name1 WHERE Login='$Login' AND Password='$Password'");
// 	$numrows = mysqli_num_rows($query);
// 	            if ($numrows > 0)echo '<br>'."user OK:".$numrows;
// 	            else echo '<br>'."user NO OK";
// 	}
// public function functionInsertRegister(){
// 	$Login = $_POST["Login"];
// 	$Password=$_POST["Password"];
// 	$Email=$_POST["Email"];	
// 	$query = "INSERT INTO `$this->database_name`.`$this->table_name1` (`Login`, `Password`,`Email`) VALUES ('$Login', '$Password', '$Email');";
// 	$ok= mysqli_query($this->connection, $query);
// 	if($ok) {
// 	     echo "New record create successfully";
// 	     return true;
// 	} else {
// 	     echo "New record: Error ";
// 	     return false;
// 	}
//  }


	private function insertProducts(){	//Solo la primera vez
		$sql = "SELECT * FROM products WHERE id=1";
		$data = $this->querySelectRow($sql);
		if(!$data){
			$sql = "INSERT INTO `products` (`id`, `type`, `product`, `description`, `price`, `quantity`, `discount`, `Shipping`, `image`, `date`) VALUES
				(1, 'tshirts', 'tshirts 1', 'tshirts tshirts tshirts\r\ntshirts tshirts tshirts\r\ntshirts tshirts tshirts\r\ntshirts tshirts tshirts', '99.00', 100, '0.00', '0.00', '76ers-embiid-cityEdition.jpg', '0000-00-00'),
				(2, 'tshirts', 'tshirts 2', 'tshirts tshirts tshirts\r\ntshirts tshirts tshirts\r\ntshirts tshirts tshirts\r\ntshirts tshirts tshirts', '89.00', 100, '0.00', '0.00', 'lakers-lebron-cityEdition.jpg', '0000-00-00'),
				(3, 'tshirts', 'tshirts 3', 'tshirts tshirts tshirts\r\ntshirts tshirts tshirts\r\ntshirts tshirts tshirts\r\ntshirts tshirts tshirts', '59.00', 100, '0.00', '0.00', 'warriors-curry-cityEdition.jpg', '0000-00-00'),
				(4, 'tshirts', 'tshirts 4', 'tshirts tshirts tshirts\r\ntshirts tshirts tshirts\r\ntshirts tshirts tshirts\r\ntshirts tshirts tshirts', '99.00', 100, '0.00', '0.00', '76ers-embiid-cityEdition.jpg', '0000-00-00'),
				(5, 'tshirts', 'tshirts 5', 'tshirts tshirts tshirts\r\ntshirts tshirts tshirts\r\ntshirts tshirts tshirts\r\ntshirts tshirts tshirts', '89.00', 100, '0.00', '0.00', 'lakers-lebron-cityEdition.jpg', '0000-00-00'),
				(6, 'tshirts', 'tshirts 6', 'tshirts tshirts tshirts\r\ntshirts tshirts tshirts\r\ntshirts tshirts tshirts\r\ntshirts tshirts tshirts', '59.00', 100, '0.00', '0.00', 'warriors-curry-cityEdition.jpg', '0000-00-00');";
			$ok = $this->queryNoSelect($sql);
		}
	}

	//Query regresa un solo registro en un arreglo asociado
	function querySelectRow($sql){
		$data = array();
		$r = mysqli_query($this->connection, $sql);
		if($r){
			if(mysqli_num_rows($r)>0){
				$data = mysqli_fetch_assoc($r);
			}
		}
		return $data;
	}

	//Query regresa un arreglo asociado
	function querySelectAll($sql){
		$data = array();
		$r = mysqli_query($this->connection, $sql);
		if($r){
			while($row = mysqli_fetch_assoc($r)){
				array_push($data, $row);
			}
		}
		return $data;
	}

	//Query regresa un valor booleano (para INSERT, UPDATE, DELETE)
	function queryNoSelect($sql){
		$r = mysqli_query($this->connection, $sql);
		return $r;
	}
  
}
?>