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
        View::make('suunnitelmat/etusivu.html');
    }
    
    public static function lista(){
        View::make('suunnitelmat/lista.html');
    }
    
    public static function yksikko(){
        View::make('suunnitelmat/yksikko.html');
    }
  }
