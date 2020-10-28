  <?php
    include_once 'util.php';	
    class DBConnector {
        protected $pdo;
        function __construct(){
          $dsn="mysql:host=".Util::$server_name.";dbname=" .Util::$database_name."";
          $options = [ 
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_EMULATE_PREPARES => false,
              PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
          ];
          try{
             $this->pdo=new PDO($dsn,Util::$user,Util::$db_pass, $options);				
           }catch (PDOException $e){
                 	echo $e->getMessage();
           }			
        }
        public function connectToDB(){
                return $this->pdo;
        } 			
        public function closeDB(){
                $this->pdo = null;
        }
    }
?>