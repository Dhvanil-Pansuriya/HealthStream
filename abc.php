<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://apiaiserg-osipchukv1.p.rapidapi.com/addContext",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "name=%3CREQUIRED%3E&sessionId=%3CREQUIRED%3E",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: ApiAIserg-osipchukV1.p.rapidapi.com",
		"X-RapidAPI-Key: 817632b1bemsha64466b345e1866p121fb4jsn1122b6fed85b",
		"content-type: application/x-www-form-urlencoded"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}