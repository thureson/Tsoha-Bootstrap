<?php

  $routes->get('/', function() {
    HelloWorldController::index();
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
