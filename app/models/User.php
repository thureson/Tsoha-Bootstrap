<?php

class User extends BaseModel {
      
    public $id, $tunnus, $salasana;
    
    public function __construct($attributes = null) {
        parent::__construct($attributes);
        $this->validators = array('validate_tunnus', 'validate_salasana');
    }
    
    public static function authenticate($username, $password){
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE tunnus = :tunnus AND salasana = :salasana LIMIT 1');
        $query->execute(array('tunnus' => $username, 'salasana' => $password));
        $row = $query->fetch();
        
        if($row){       
            $user = new User(array(
              'id' => $row['id'],
              'tunnus' => $row['tunnus'],
              'salasana' => $row['salasana']
          ));
          
          return $user;
          
        }else{
          return null;
        }
    }
    
    public static function find($id){

        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if($row){
            $user = new User(array(
                'id' => $row['id'],
                'tunnus' => $row['tunnus'],
                'salasana' => $row['salasana']
            ));
        
            return $user;
        }

        return null;
    }
    
    public function validate_tunnus(){
        return $this->validate_string_lenght($this->tunnus, 1);
    }
    
    public function validate_salasana(){
        return $this->validate_string_lenght($this->salasana, 1);
    }
  }