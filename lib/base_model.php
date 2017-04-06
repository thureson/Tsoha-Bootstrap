<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();

      foreach($this->validators as $validator){
        // Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon
        $errorArray = $this->{$validator}();
        $errors = array_merge($errors, $errorArray);
      }
     
      return $errors;
    }
    
    public function validate_string_lenght($string, $lenght){
        $errors = array();
        if($string == '' || $string == null){
            $errors[] = 'Kenttä ei saa olla tyhjä';
        }
        if(strlen($string) < $lenght){
            $errors[] = 'Kentän pitää olla vähintään ' . $lenght . ' merkkiä';
        }
        
        return $errors;
    }
    
    public function validate_integer_value($integer, $min, $max){
        $errors = array();
        if($integer == '' || $integer == null){
            $errors[] = 'Integer ei saa olla tyhjä';
        }
        if($integer < $min){
            $errors[] = 'Integerin pitää olla vähintään ' . $min;
        }
        if($integer > $max){
            $errors[] = 'Integerin pitää olla alle ' . $max;
        }
        
        return $errors;
    }

  }
