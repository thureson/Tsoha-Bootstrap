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
}
