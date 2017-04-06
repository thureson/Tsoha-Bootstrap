<?php

class Ehdokas extends BaseModel {
    
    public $id, $nimi, $kuvaus, $puolue;
    
    public function __construct($attributes = null) {
        parent::__construct($attributes);
        $this->validators = array('validate_nimi', 'validate_kuvaus', 'validate_puolue');
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
                'puolue' => $row['puolue']
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
                'puolue' => $row['puolue']
            ));
        
            return $ehdokas;
        }

        return null;
    }
    
    public function save($id, $nimi, $kuvaus, $puolue){
        $query = DB::connection()->prepare('INSERT INTO Ehdokas(id, nimi, kuvaus, puolue) VALUES(:id, :nimi, :kuvaus, :puolue)');
        $query->execute(array('id' => $id, 'nimi' => $nimi, 'kuvaus' => $kuvaus, 'puolue' => $puolue));
    }
    
    public function update($id, $nimi, $kuvaus, $puolue){
        $query = DB::connection()->prepare('UPDATE Ehdokas SET nimi = :nimi, kuvaus = :kuvaus, puolue = :puolue WHERE id = :id');
        $query->execute(array('id' => $id, 'nimi' => $nimi, 'kuvaus' => $kuvaus, 'puolue' => $puolue));
    }
    
    public function delete($id){
        $query = DB::connection()->prepare('DELETE FROM Ehdokas WHERE id = :id');
        $query->execute(array('id' => $id));
    }
    
    public function validate_nimi(){
        return $this->validate_string_lenght($this->nimi, 1);
    }
    
    public function validate_kuvaus(){
        return $this->validate_string_lenght($this->kuvaus, 1);
    }
    
    public function validate_puolue(){
        return $this->validate_string_lenght($this->puolue, 1);
    }
}
