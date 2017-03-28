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
            'id' => ehdokkaat_controller::size() + 1,
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus'],
            'puolue_id' => $params['puolue_id']
        ));
        
        $ehdokas->save($ehdokas->id, $ehdokas->nimi, $ehdokas->kuvaus, $ehdokas->puolue_id);
        
        Redirect::to('/ehdokkaat');
    }
    
    public static function size(){
        $size = 0;
        $ehdokkaat = Ehdokas::all();
        foreach ($ehdokkaat as $ehdokas){
            $size = $size + 1;
        }
        return $size;
    }
    
    public static function newEhdokas(){
        View::make('suunnitelmat/new.html');
    }
}
