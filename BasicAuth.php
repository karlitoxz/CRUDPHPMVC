<?php 

	if (!isset($_SERVER['PHP_AUTH_USER'])) {
		header("WWW-Authenticate: Basic realm\"Private Area\"");
		header("HTTP/1.0 401 Unauthorized");
		print "Sorry, you do need proper credendtials";
		exit;
	}else{
		if ($_SERVER['PHP_AUTH_USER'] == 'segurihack' && $_SERVER['PHP_AUTH_PW'] == '1234') {
			/*base64 :	segurihack:1234
						c2VndXJpaGFjazoxMjM0
			*/
			print "You are in yhe private area";
		}else{
			header("HTTP/1.0 401 Unauthorized");
			print "Sorry, you do need proper credendtials";
			exit;
		}
	}

/*jquery extraido de postman
	var settings = {
	  "url": "http://localhost/juanX/BasicAuth.php",
	  "method": "GET",
	  "timeout": 0,
	  "headers": {
	    "Authorization": "Basic c2VndXJpaGFjazoxMjM0"
	  },
	};

	$.ajax(settings).done(function (response) {
	  console.log(response);
	});
*/

?>