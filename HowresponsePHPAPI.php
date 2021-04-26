<?php

	if (isset($_POST['botones'])) {
		header('Content-type: application/json; charset=utf-8');
		$resp = array("valor01"=> "1000", "valor02" => "2000", "status" => "success");
		echo json_encode($resp, JSON_INVALID_UTF8_IGNORE);
		http_response_code(200);
	}
?>