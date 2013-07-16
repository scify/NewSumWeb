<?php
    $clientCredentials="testClient|test";
    $server_IP="http://localhost:1111/1.0/";
    
    $personal=$server_IP."personal/".$clientCredentials."/";
    $stereotype=$server_IP."stereotype/".$clientCredentials."/";
    $community=$server_IP."community/".$clientCredentials."/";
    
    #function adduser($usr, $attr){
        #global $personal;
        #$request=$personal.'post_user.json';
        #$response=  file_get_contents($request);
    #}
    
    #function getUserFeatureList($usr) {
        #global $personal;
        #$request = $personal.'users_attributes.json';
        #$response = file_get_contents($request);
    #}
    
    #function increaseFeatureValue($ftr) {
        #global $personal;
        #$request = $personal.'users_attributes.json';
        #$response = file_get_contents($request);
    #}
    
    #function checkUser($usr){
        
    #}
    
    #function getUsers(){
        
    #}
    
    #function getFeaturesList(){
        
    #}
  
?>