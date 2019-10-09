<?php
    require __DIR__.'../../../vendor/autoload.php';
    use Kreait\Firebase\Factory;
    
    class BaseDeDatos{
        private $secretFile =  'secret/datosproyectopoo-89244372cebd.json';
        private $URI = 'https://datosproyectopoo.firebaseio.com/';
        private $bd;
      
        public function __construct(){
            $factory = (new Factory)
            ->withServiceAccount($this->secretFile)
            ->withDatabaseUri($this->URI);
            
            $this->bd= $factory->createDatabase();
        }

        public function getBD(){
            return $this->bd;
        }
    }

?>