<?php
if($_SERVER['SERVER_NAME'] <> 'localhost' )
{
	header( "HTTP/1.1 301 Moved Permanently" );
	header( "Location: http://localhost/".$_SERVER ['REQUEST_URI'] );
}
?>