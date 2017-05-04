<?php
    
  function check_logged_in(){
      BaseController::check_logged_in();
  }

  $routes->get('/', function() {
    HelloWorldController::etusivu();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
  $routes->get('/etusivu', function() {
    HelloWorldController::etusivu();
  });
  
  $routes->get('/ehdokkaat', function() {
    ehdokkaat_controller::ehdokkaat();
  });
  
  $routes->get('/yksikko', function() {
    HelloWorldController::yksikko();
  });
  
  $routes->get('/ehdokas/:id', function($id) {
    ehdokkaat_controller::ehdokas($id);
  });
  
  $routes->get('/new', function(){
    ehdokkaat_controller::newEhdokas();
  });
  
  $routes->post('/new', function(){
    ehdokkaat_controller::store();
  });
  
  $routes->get('/ehdokas/:id/muokkaa', 'check_logged_in', function($id){
    ehdokkaat_controller::muokkaaEhdokas($id);
  });
  
  $routes->post('/ehdokas/:id/muokkaa', function($id){
    ehdokkaat_controller::updateEhdokas($id);
  });
  
  $routes->get('/ehdokas/:id/newhist', function($id){
    ehdokkaat_controller::lisaaEhdokasHistoria($id);
  });
  
  $routes->post('/ehdokas/:id/newhist', function($id){
    ehdokkaat_controller::storeHistoria($id);
  });
  
  $routes->post('/ehdokas/:id/:hist/destroy', function($id, $hist){
    ehdokkaat_controller::destroyHistoria($id, $hist);
  });
  
  $routes->get('/ehdokas/:id/:hist/muokkaa', 'check_logged_in', function($id, $hist){
    ehdokkaat_controller::muokkaaHistoria($id, $hist);
  });
  
  $routes->post('/ehdokas/:id/:hist/muokkaa', function($id, $hist){
    ehdokkaat_controller::updateHistoria($id, $hist);
  });
  
  $routes->get('/ehdokas/:id/destroy', function($id){
    ehdokkaat_controller::destroyEhdokas($id);
  });
  
  $routes->get('/logina', function(){
    UserController::login();
  });

  $routes->post('/', function(){
      user_controller::handle_login();
  });
  
  $routes->post('/logout', function(){
      user_controller::logout();
  });
  
  
