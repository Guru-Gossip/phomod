<?php

$name = "Kwame";
$email = "hi@gmail.com";

$name = str_replace(" ", "", $name);
$email = str_replace(" ", "", $email);
$list = [$name, $email];
$coun = count($list);

$err = "";
for($i = 0; $i < $coun; $i++){
    if(empty($list[$i])){
        $err .= 'empty';
    }
}

if(!empty($err)){
    echo "Empty fields";
}

else{
    echo "Valid fields";
}