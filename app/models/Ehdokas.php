<?php

class Ehdokas extends BaseModel {
    
    public $id, $nimi, $kuvaus, $puolue_id;
    
    public function __construct($attributes = null) {
        parent::__construct($attributes);
    }
    
    public static function all(){

        $query = DB::connection()->prepare('SELECT * FROM Ehdokas');
        $query->execute();
        $rows = $query->fetchAll();
        $ehdokkaat = array();

        foreach($rows as $row){

            $ehdokkaat[] = new Ehdokas(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'kuvaus' => $row['kuvaus'],
                'puolue_id' => $row['puolue_id']
            ));
        }

        return $ehdokkaat;
    }
    
    public static function find($id){

        $query = DB::connection()->prepare('SELECT * FROM Ehdokas WHERE id = :id');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if($row){
            $ehdokas = new Ehdokas(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'kuvaus' => $row['kuvaus'],
                'puolue_id' => $row['puolue_id']
            ));
        
            return $ehdokas;
        }

        return null;
    }
}
