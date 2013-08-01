<?php
    $request = "http://83.212.117.40:1111/1.0/personal/testClient|test/features.json?featuresPattern=*";
    $result = count(json_decode(file_get_contents($request)));
    echo ($result);
?>
