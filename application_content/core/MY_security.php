<?php
class MY_Security extends CI_Security {
    public function __construct(){
        parent::__construct();
    }
    public function csrf_show_error(){       
        //show_error('Hubo un error, por favor intente nuevamente');        
		header("Location: ".INDEXURL."errorCsrf",true);
    }
} 
?>