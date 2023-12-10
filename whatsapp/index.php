<?php 


/**
 * Redirect to given URL.
 *
 * @param  string  $url
 * @return void
 */
function redirect_to($url, array $flash = array())
{
	foreach ($flash as $key => $value) {
		app('session')->flash($key, $value);
	}

	if (headers_sent()) {
		echo '<html><body onload="redirect_to(\''.$url.'\');"></body>'.
			'<script type="text/javascript">function redirect_to(url) {window.location.href = url}</script>'.
			'</body></html>';
	} else {
		header('Location:' . $url);
	}

	exit;
}


redirect_to('https://api.whatsapp.com/send?phone=2348056923949'); 


?>

