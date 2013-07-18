<?php
    $clientCredentials="testClient|test";
    $server_IP="http://localhost:1111/1.0/";
    
    $personal=$server_IP."personal/".$clientCredentials."/";
    $stereotype=$server_IP."stereotype/".$clientCredentials."/";
    $community=$server_IP."community/".$clientCredentials."/";
   
    function codeFeature($ftr){
        global $lang;
        $res=str_replace(" ","$$$",$ftr);
        return $lang.".".$res;
    }
    
    function cleanFeature($string){
        global $lang;
        $res=str_replace("$$$"," ",$string);
        return str_replace($lang.".","",$res);
    }
    
    function customArrayToString($array){
        $res="{";
        foreach ($array as $x=>$x_value){
            $res=$res.'"'.$x.'":"'.$x_value.'",';
        }
        $res=$res."}";
        return str_replace(" ","$$$",$res);
    }
    
    function adduser($usr, $attr){
        //TODO maybe call another function to initialize the users features to 1 for his language
        global $personal;
        global $lang;
        
        if ($usr==null){
            return false;
        }
        else if (count($attr)==0){
            $request=$personal.'post_user.xml?username='.$usr.'&atr={"lang":'.$lang.'}';
            $response=file_get_contents($request);
            return !$response==null;
        }
        else {
            $request=$personal.'post_user.xml?username='.$usr.'&attr='.customArrayToString($attr);
            $response=file_get_contents($request);
            return !$response==null;
        }
    }
    
    function getUserFeatureList($usr,$patt) {
        global $personal;
        global $lang;
        
        if ($usr==null) {
            return false;
        }
        else if ($patt==null) {
            $request=$personal.'users_features.json?username='.$usr;
            $response=file_get_contents($request);
            $result=json_decode($response,true);
        
            $result2=$result["result"]["row"];
            $features=array();
            $i=0;
            foreach ($result2 as $curRow){
                if (strstr($curRow["ftr"],$lang)){
                    $features[$i]=cleanFeature($curRow["ftr"]);
                    $i=$i+1;
                }
            }
            return $features;
        }
        else {
            $request=$personal.'users_features.json?username='.$usr.'&features='.$patt;
            $response=file_get_contents($request);
            $result=json_decode($response,true);
            
            $result2=$result["result"]["row"];
            $features=array();
            for ($i=1;$i<count($result2);$i++){
                $features[$i]=strstr($result2[$i]["ftr"],$patt);
            }
            return $features;
        }
    }
    
    function increaseFeatureValue($usr,$ftr,$val) {
        $personal="http://localhost:1111/pers?clnt=testClient|test&com=incval&usr=";
        
        if ($usr==null||count($ftr)==0){
            return false;
        }
        else {
            //$request=$personal.'increase_users_values.json?username='.$usr.'&features='.customArrayToString($ftr);
            $request=$personal.$usr."&".codeFeature($ftr)."=".$val;
            $response=file_get_contents($request);
            return !$response==null;
        }
    }
    
    function getFeaturesList(){
        global $personal;
        
        $request=$personal.'features.json?featuresPattern=*';
        $response=file_get_contents($request);
        $response=str_replace("$$$"," ",$response);
        
        $result=json_decode($response,true);
        
        return $result["result"]["row"];
    }
    
    function setFeatures($ftrs){
        global $personal;

        $curftrs=getFeaturesList();
        for ($i=0;$i<count($curftrs);$i++){
            $ftr=$curftrs[$i]["ftr"];
            $defval=$curftrs[$i]["defval"];
            $tempftrs[$ftr]=$defval;
        }
        foreach ($ftrs as $x=>$x_value){
            if (!array_key_exists($x,$tempftrs)){
                $newftrs[$x]=$x_value;
            }
        }
        
        if (count($newftrs)!=0){
            $request=$personal.'add_features.json?features='.customArrayToString($newftrs);
            $response=file_get_contents($request);
            return !$response==null;
        }
        else {
            return false;
        }
        
    }
    
?>