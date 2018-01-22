<?php
	$file = base64_encode(file_get_contents("../img/42.png"));
	if ($PHP_AUTH_USER === "zaz" && $PHP_AUTH_PW === "jaimelespetitsponeys")
		echo "<html><body>Bonjour Zaz<br />\n<img src='data:image/png;base64,$file>\n</body></html>\n";
	else
	{
		header("HTTP/1.0 401 Unauthorized");
		header("Date: Tue, 26 Mar 2013 09:42:42 GMT");
		header("WWW-Authenticate: Basic realm=''Espace membres''");
		header_remove("Authentication problem. Ignoring this.");
		echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>";
	}
?>