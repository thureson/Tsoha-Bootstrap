<?php

class Puolue extends BaseModel {
    
    public $id, $puolue, $kuvaus;
    
    public function __construct($attributes = null) {
        parent::__construct($attributes);
    }
    
    public static function all(){

        $query = DB::connection()->prepare('SELECT * FROM Puolue');
        $query->execute();
        $rows = $query->fetchAll();
        $puolueet = array();

        foreach($rows as $row){

            $puolueet[] = new Puolue(array(
                'id' => $row['id'],
                'puolue' => $row['puolue'],
                'kuvaus' => $row['kuvaus']
            ));
        }

        return $puolueet;
    }
}