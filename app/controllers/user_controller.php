<?php

    class user_controller extends BaseController{
      
      public static function handle_login(){
        $params = $_POST;
        
        $user = User::authenticate($params['username'], $params['password']);
        
        if(!$user){
          View::make('suunnitelmat/etusivu.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
        } else {
          $_SESSION['user'] = $user->id;
          
          $user_logged_in = self::get_user_logged_in();
          View::make('suunnitelmat/etusivu.html', array('message' => 'Tervetuloa!', 'user_logged_in' => $user_logged_in));
        }
      }
      
      public static function logout(){
          $_SESSION['user'] = null;
          View::make('suunnitelmat/etusivu.html', array('message' => 'Olet kirjautunut ulos'));
      }
    }