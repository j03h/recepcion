<?php

echo $_SERVER['REMOTE_USER'];
echo $_SERVER['LOGON_USER'];
echo $_SERVER['AUTH_USER'];
echo $_SERVER['REDIRECT_LOGON_USER'];
echo $_SERVER['REDIRECT_AUTH_USER'];
echo getenv('USERNAME');

?>