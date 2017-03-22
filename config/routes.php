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
  
  $routes->get('/lista', function() {
  HelloWorldController::lista();
  });
  
  $routes->get('/yksikko', function() {
  HelloWorldController::yksikko();
  });
