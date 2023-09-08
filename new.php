<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['pnr'])
{

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://indianrailways.p.rapidapi.com/index.php?pnr=".$_POST['pnr'],
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: indianrailways.p.rapidapi.com",
		"X-RapidAPI-Key: 076ae68d2fmsh579f8b4059fa9d3p12fdd8jsncf3349ccd097"
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
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
</head>
<body>
    <form action="" method="post">
        <label>pnr:</label>
      <input type="text" name="pnr" required>
      
    </div>
    <button>Submit</button>
</form>
</body>
</html>
