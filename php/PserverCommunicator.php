<?php
    $clientCredentials="testClient|test";
    $server_IP="http://localhost:1111/1.0/";
    
    $personal=$server_IP."personal/".$clientCredentials."/";
    $stereotype=$server_IP."stereotype/".$clientCredentials."/";
    $community=$server_IP."community/".$clientCredentials."/";
    
    function adduser($usr, $attr){
        global $personal;
        
        $request=$personal.'post_user.json';
        $attrs=json_encode($attr, true);
        $postargs='username='.$usr.'&attr='.$attrs;
        $session=curl_init($session);
        
        curl_setopt($session, CURLOPT_POST, true);
        curl_setopt($session, CURLOPT_POSTFIELDS, $postargs);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        
        $response=curl_exec($session);
        curl_close($session);
        return json_decode($response,true);
    }
    
    function getUserFeatureList($usr) {
        global $personal;
        
        $request=$personal.'users_features.json?username='.$usr;
        $session=curl_init($request);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        
        $response=curl_exec($session);
        curl_close($session);
        return json_decode($response,true);
    }
    
    function increaseFeatureValue($usr,$ftr) {
        global $personal;
        
        $request=$personal.'increase_users_values.json';
        $ftrs=json_encode($ftr, true);
        $postargs='username='.$usr.'&featurelist='.$ftrs;
        $session=curl_init($session);
        
        curl_setopt($session, CURLOPT_POST, true);
        curl_setopt($session, CURLOPT_POSTFIELDS, $postargs);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        
        $response=curl_exec($session);
        curl_close($session);
        return json_decode($response,true);
    }
    
    function getUsers(){
        global $personal;
        
        $request=$personal.'users.json?where=*';
        $session=curl_init($request);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        
        $response=curl_exec($session);
        curl_close($session);
        return json_decode($response,true);
    }
    
    function getFeaturesList(){
        global $personal;
        
        $request=$personal.'features.json?featuresPattern=*';
        $session=curl_init($request);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        
        $response=curl_exec($session);
        curl_close($session);
        return json_decode($response,true);
    }
    
    function setFeatures($ftrs){
        $curftrs=getFeaturesList();
        $newftrs=Array();
        foreach ($ftrs as $x=>$x_value){
            if (!array_key_exists($x,$curftrs)){
                $newftrs[$x]=$x_value;
            }
        }
        
        $request=$personal.'add_features.json';
        $Jftrs=json_encode($newftrs, true);
        $postargs='features='.$Jftrs;
        $session=curl_init($session);
        
        curl_setopt($session, CURLOPT_POST, true);
        curl_setopt($session, CURLOPT_POSTFIELDS, $postargs);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        
        $response=curl_exec($session);
        curl_close($session);
        return json_decode($response,true);
    }

?>