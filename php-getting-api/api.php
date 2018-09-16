<?php
$file = "https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD,EUR"; //adding a variable with URL
$data = file_get_contents($file); // sending UTL content to variable
$result = json_decode($data, true); // deocding data to json
echo $result['USD'];                //displaying $result
echo "<br>";
echo $result['EUR'];
?>
