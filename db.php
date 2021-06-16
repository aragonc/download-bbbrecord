<?php 

// class Conexion{

//     private $host = "localhost";
//     private $user = "jian";
//     private $password = "mysql123";
//     private $db ="video";
//     private $conn;

//     public function __construct(){
//         $connectingString ="mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
//         try{
//             $this->conn = new PDO($connectingString,$this->user,$this->password);
//             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
//         }catch (exception $e){
//             $this->conn ="Error de Conexion";
//             echo "ERROR:".$e.getMessage();
//         }
//     }  

//     public function database(){
//         $host = "localhost";
//         $user = "jian";
//         $password = "mysql123";
//         $db ="video";
//         $conexion = mysqli_connect($host,$user,$password,$db) or die ("error al conectar");
//         if($conexion){
//             echo "Conexion Exitosa";
//         }
//     }

// }




 $conn = mysqli_connect(
     'localhost', 
     'jian',
     'mysql123',
     'video'
 );

// if(isset($conn)){
//     echo "conectada ";
// }

?>