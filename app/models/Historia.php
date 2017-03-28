<?php

class Historia extends BaseModel {
    
    public $id, $ehdokas_id, $aanimaara, $vuosi;
    
    public function __construct($attributes = null) {
        parent::__construct($attributes);
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
                '$vuosi' => $row['$vuosi']
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
}