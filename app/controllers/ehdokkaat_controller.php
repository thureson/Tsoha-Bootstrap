<?php

class ehdokkaat_controller extends BaseController{
    
    public static function ehdokkaat(){
        
        $ehdokkaat = Ehdokas::all();
        View::make('suunnitelmat/ehdokkaat.html', array('ehdokkaat' => $ehdokkaat));
    }
    
    public static function ehdokas($id){
        
        $ehdokas = Ehdokas::find($id);
        $historiat = Historia::find($ehdokas->id);
        View::make('suunnitelmat/ehdokas.html', array('ehdokas' => $ehdokas, 'historiat' => $historiat));
    }
    
    public static function store(){
        $params = $_POST;
        $ehdokas = new Ehdokas(Array(
            'id' => ehdokkaat_controller::highest() + 1,
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus'],
            'puolue' => $params['puolue']
        ));
        
        $errors = $ehdokas->errors();
        
        if (count($errors) == 0){
            $ehdokas->save($ehdokas->id, $ehdokas->nimi, $ehdokas->kuvaus, $ehdokas->puolue);
            Redirect::to('/ehdokkaat', array('errors' => $errors));           
        } else {
            View::make('suunnitelmat/new.html', array('errors' => $errors));
        }
    }
    
    public static function storeHistoria($ehdokas_id){
        $params = $_POST;
        $historia = new Historia(Array(
            'id' => ehdokkaat_controller::highestHistoriaId() + 1,
            'ehdokas_id' => $ehdokas_id,
            'aanimaara' => $params['aanimaara'],
            'vuosi' => $params['vuosi']
        ));
        
        $errors = $historia->errors();
        
        if (count($errors) == 0){
            $historia->save($historia->id, $historia->ehdokas_id, $historia->aanimaara, $historia->vuosi);
            Redirect::to('/ehdokas/' . $ehdokas_id, array('errors' => $errors));           
        } else {
            View::make('suunnitelmat/newhist.html', array('errors' => $errors, 'ehdokas' => Ehdokas::find($ehdokas_id)));
        }
    }
    
    public static function size(){
        $size = 0;
        $ehdokkaat = Ehdokas::all();
        foreach ($ehdokkaat as $ehdokas){
            $size = $size + 1;
        }
        return $size;
    }
    
    public static function highest(){
        $highest = 0;
        $ehdokkaat = Ehdokas::all();
        foreach ($ehdokkaat as $ehdokas){
            if($ehdokas->id > $highest){
                $highest = $ehdokas->id;
            }
        }
        return $highest;
    }
    
    public static function highestHistoriaId(){
        $highest = 0;
        $historiat = Historia::all();
        foreach ($historiat as $historia){
            if($historia->id > $highest){
                $highest = $historia->id;
            }
        }
        return $highest;
    }
    
    public static function newEhdokas(){
        View::make('suunnitelmat/new.html');
    }
    
    public static function muokkaaEhdokas($id){
        $ehdokas = Ehdokas::find($id);
        View::make('suunnitelmat/muokkaa.html', array('ehdokas' => $ehdokas));
    }
    
    public static function lisaaEhdokasHistoria($id){
        $ehdokas = Ehdokas::find($id);
        View::make('suunnitelmat/newhist.html', array('ehdokas' => $ehdokas));
    }
    
    public static function updateEhdokas($ehdokas_id){
        $params = $_POST;
        $ehdokas = new Ehdokas(Array(
            'id' => $ehdokas_id,
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus'],
            'puolue' => $params['puolue']
        ));
        
        $errors = $ehdokas->errors();
        
        if (count($errors) == 0){
            $ehdokas->update($ehdokas->id, $ehdokas->nimi, $ehdokas->kuvaus, $ehdokas->puolue);
            Redirect::to('/ehdokkaat', array('errors' => $errors));           
        } else {
            View::make('suunnitelmat/muokkaa.html', array('errors' => $errors, 'ehdokas' => $ehdokas));
        }        
    }
}
