PHP:
	Crear:
		setcookie(name, value, expire, path, domain, secure, httponly);
	Leer:
	$_COOKIE['YOUR COOKIE NAME'];
	Borrar:
	if (isset($_SESSION)) {
	  session_destroy();
	  // eliminar todas las cookies
	  if (isset($_SERVER['HTTP_COOKIE'])) {
	      $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
	      foreach($cookies as $cookie) {
	          $parts = explode('=', $cookie);
	          $name = trim($parts[0]);
	          setcookie($name, null, time()-3600);
	          setcookie($name, null, time()-3600, '/');
	      }
	  }
	}

JS:
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
	Crear:
	Cookies.set('YOURCOOKIENAME', VALUE, {expires: 1});
	Leer:
	Cookies.get('YOURCOOKIENAME')
	Borrar:
	Cookies.remove('YOURCOOKIENAME')


