<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
        View::make('helloworld.html');
    }
    
    public static function etusivu(){
        $user_logged_in = self::get_user_logged_in();
        if (!$user_logged_in){
            View::make('suunnitelmat/etusivu.html');
        }else{
            View::make('suunnitelmat/etusivu.html', array('user_logged_in' => $user_logged_in));
        }
    }
    
    public static function ehdokkaat(){
        View::make('suunnitelmat/ehdokkaat.html');
    }
    
    public static function yksikko(){
        View::make('suunnitelmat/yksikko.html');
    }
  }
