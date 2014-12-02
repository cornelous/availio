<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$connect = mysql_pconnect(AC_DB_HOST, AC_DB_USER, AC_DB_PASS) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db(AC_DB_NAME, $connect) or die('Could not select database.');
?>