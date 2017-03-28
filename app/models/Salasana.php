<?php

class Salasana extends BaseModel {
    
    public $id, $salasana, $kayttaja_id;
    
    public function __construct($attributes = null) {
        parent::__construct($attributes);
    }
    
    public static function all(){

        $query = DB::connection()->prepare('SELECT * FROM Salasana');
        $query->execute();
        $rows = $query->fetchAll();
        $salasanat = array();

        foreach($rows as $row){

            $salasanat[] = new Salasana(array(
                'id' => $row['id'],
                'salasana' => $row['salasana'],
                'kayttaja_id' => $row['kayttaja_id']
            ));
        }

        return $salasanat;
    }
}