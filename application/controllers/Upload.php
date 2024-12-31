<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('mhs')) {
		// 	redirect(base_url('login'));
		// }


	}

	public function index()
	{
		$data = json_decode(file_get_contents('php://input'), true);

		if (isset($data['image'])) {
			$imageData = $data['image'];

			// Remove the data URL scheme (data:image/png;base64,)
			$imageData = str_replace('data:image/png;base64,', '', $imageData);
			$imageData = str_replace(' ', '+', $imageData);

			// Decode the base64 data
			$image = base64_decode($imageData);


			$fileName = random_string('numeric', 8) . '.png';
			// Save the image file;
			// file_put_contents('./assets/takeImg/' . $fileName, $image);

			$urlCreate = 'https://api-us.faceplusplus.com/facepp/v3/compare';

			$dataCreate = array(
				'api_key' => 'RBGt4YxCsVU5v1fMAIbnrj_tymPdZWuq',
				'api_secret' => 'TSd9P3QQ_DwWp2EzC5XTbjWRru0sKlpJ',
				'image_base64_1' => $imageData,
				'image_url2' => 'https://digitallibrary-iteb.my.id/assets/man1.jpg',
			);

			$ch = curl_init($urlCreate);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $dataCreate);
			$response = curl_exec($ch);
			curl_close($ch);

			$result = json_decode($response, true);
			print_r($result);
		} else {
			echo 'No image data received.';
		}
	}
}
