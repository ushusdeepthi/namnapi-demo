<?php
//steg 1- Ange lämpliga HTTP headers
//läs mer här https://stackoverflow.com/questions/10636611/how-does-access-control-allow-origin-header-work

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");
header("Content-Type: application/json; charset=UTF-8");
//steg2- skapa arrayer
$firstNames =
    ["Åsa", "Mahmud", "Björn", "Jimmy", "Deepthi", "Sara", "Anna", "Stephy", "Smith", "viktor"];
$lastNames =
    ["Öberg", "Al Hakim", "Ushus", "Carlsson", "Jacob", "Åstrand", "Svensson", "Brenchman", "Johansson", "Rikardsson"];

//steg 3 Skapa 10 namn och spara dessa i en ny array
$names=array();
for ($i = 0; $i < 10; $i++) {
    $name = array(
        "firstname" => $firstNames[rand(0, 9)],
        "lastname" => $lastNames[rand(0, 9)]
    );
    array_push($names, $name);
}
// print_r($names);die();

// Steg 4 – Konvertera PHP-arrayen till JSON
$json = json_encode($names,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); //without JSON_UNESCAPED UNICODE we get swedish letters as special characters and preet print gives a better abnd readable print
// json_encode — Returns the JSON representation of a value
// http://php.net/manual/en/function.json-encode.php

// Steg 5 – Skicka JSON till klienten
echo $json;
// OBS!Viktigt
// Ingen extra data får skickas till klienten,
// t.ex. HTML-kod

?>