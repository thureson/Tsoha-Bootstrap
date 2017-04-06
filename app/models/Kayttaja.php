<?php

class Kayttaja extends BaseModel {
    
    public $id, $tunnus, $salasana;
    
    public function __construct($attributes = null) {
        parent::__construct($attributes);
    }
    
    public static function all(){

        $query = DB::connection()->prepare('SELECT * FROM Kayttaja');
        $query->execute();
        $rows = $query->fetchAll();
        $kayttajat = array();

        foreach($rows as $row){

            $kayttajat[] = new Kayttaja(array(
                'id' => $row['id'],
                'tunnus' => $row['tunnus'],
                'salasana' => $row['tunnus']
            ));
        }

        return $kayttajat;
    }
}