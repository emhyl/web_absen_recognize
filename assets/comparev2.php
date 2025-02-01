<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$data = json_decode(file_get_contents('php://input'), true);


$new_img = $data['new_img'];
$origin_img = $data['origin_img'];

$new_img = str_replace('data:image/png;base64,', '', $new_img);
$new_img = str_replace(' ', '+', $new_img);

$origin_img = str_replace('data:image/png;base64,', '', $origin_img);
$origin_img = str_replace(' ', '+', $origin_img);

// Decode the base64 data
$img_save = base64_decode($new_img);

$fileName = "IMG-" . date("H_i_s") . '.png';
// Save the image file;
file_put_contents('takeIMG/' . $fileName, $img_save);

$urlCreate = 'https://api-us.faceplusplus.com/facepp/v3/compare';

$dataCreate = array(
    'api_key' => 'RBGt4YxCsVU5v1fMAIbnrj_tymPdZWuq',
    'api_secret' => 'TSd9P3QQ_DwWp2EzC5XTbjWRru0sKlpJ',
    'image_base64_1' => $new_img,
    'image_base64_2' => $origin_img,
    // 'image_url1' => 'https://digitallibrary-iteb.my.id/assets/man1.jpg',
    // 'image_url2' => 'https://digitallibrary-iteb.my.id/assets/man1.jpg',
);

$ch = curl_init($urlCreate);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataCreate);
$response = curl_exec($ch);
curl_close($ch);

// $result = json_decode($response, true);
echo ($response);
