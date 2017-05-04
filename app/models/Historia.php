<?php

class Historia extends BaseModel {
    
    public $id, $ehdokas_id, $aanimaara, $vuosi;
    
    public function __construct($attributes = null) {
        parent::__construct($attributes);
        $this->validators = array('validate_aanimaara', 'validate_vuosi');
    }
    
    public static function all(){

        $query = DB::connection()->prepare('SELECT * FROM Historia');
        $query->execute();
        $rows = $query->fetchAll();
        $historiat = array();

        foreach($rows as $row){

            $historiat[] = new Historia(array(
                'id' => $row['id'],
                'ehdokas_id' => $row['ehdokas_id'],
                'aanimaara' => $row['aanimaara'],
                'vuosi' => $row['vuosi']
            ));
        }

        return $historiat;
    }
    
    public static function find($ehdokas_id){
        
        $query = DB::connection()->prepare('SELECT * FROM Historia WHERE ehdokas_id = :ehdokas_id');
        $query->execute(array('ehdokas_id' => $ehdokas_id));
        $rows = $query->fetchAll();
        $historiat = array();

        foreach($rows as $row){

            $historiat[] = new Historia(array(
                'id' => $row['id'],
                'ehdokas_id' => $row['ehdokas_id'],
                'aanimaara' => $row['aanimaara'],
                'vuosi' => $row['vuosi']
            ));
        }

        return $historiat;
    }
    
    public static function findOne($ehdokas_id, $hist_id){
        
        $query = DB::connection()->prepare('SELECT * FROM Historia WHERE ehdokas_id = :ehdokas_id AND id = :id');
        $query->execute(array('id' => $hist_id, 'ehdokas_id' => $ehdokas_id));
        $row = $query->fetch();

        if($row){
            $historia = new Historia(array(
                'id' => $row['id'],
                'ehdokas_id' => $row['ehdokas_id'],
                'aanimaara' => $row['aanimaara'],
                'vuosi' => $row['vuosi']
            ));
        
            return $historia;
        }
        return null;
    }
    
    public static function save($id, $ehdokas_id, $aanimaara, $vuosi){

        $query = DB::connection()->prepare('INSERT INTO Historia(id, ehdokas_id, aanimaara, vuosi) VALUES(:id, :ehdokas_id, :aanimaara, :vuosi)');
        $query->execute(array('id' => $id, 'ehdokas_id' => $ehdokas_id, 'aanimaara' => $aanimaara, 'vuosi' => $vuosi));
    }
    
    public function update($id, $ehdokas_id, $aanimaara, $vuosi){
        $query = DB::connection()->prepare('UPDATE Historia SET id = :id, ehdokas_id = :ehdokas_id, aanimaara = :aanimaara, vuosi = :vuosi WHERE id = :id AND ehdokas_id = :ehdokas_id');
        $query->execute(array('id' => $id, 'ehdokas_id' => $ehdokas_id, 'aanimaara' => $aanimaara, 'vuosi' => $vuosi));
    }
    
    public static function destroy($id){

        $query = DB::connection()->prepare('DELETE FROM Historia WHERE id = :id');
        $query->execute(array('id' => $id));
    }
    
    public function validate_aanimaara(){
        return $this->validate_integer_value($this->aanimaara, 0, 99999999);
    }
    
    public function validate_vuosi(){
        return $this->validate_integer_value($this->vuosi, 1900 , 3000);
    }
}