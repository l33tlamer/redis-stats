<?php
// CONFIG: config.php

/*
	Servers are defined as an array
	[ Name, IP/Socket, Port, Password ]

	Name (string):                     name shown in drop-down list
	IP/Socket (string):                IP address or socket of the server
	Port (integer):                    port of server, use -1 for socket
	Password entry (string|array):     credentials for the server (optional)
*/

$servers = [
	[ 'Local', '127.0.0.1', 6379 ],
	[ 'Local socket', 'unix:///var/run/redis.sock', -1 ],
	[ 'Local with password', '127.0.0.1', 6379, 'password_here' ],
	[ 'Local with user and password', '127.0.0.1', 6379, ['username', 'password_here'] ],
];

// Show a 'Flush' button for databases
define("FLUSHDB", true);

// Ask for confirmation before flushing database
define("CONFIRM_FLUSHDB", true);

// Show a 'Flush All' button for the instance
define("FLUSHALL", true);

// Ask for confirmation before flushing the entire instance
define("CONFIRM_FLUSHALL", true);

// Command Masking
$command = [
	'FLUSHDB'  => '',
	'FLUSHALL' => '',
];

// debug mode - you don't want to set this!
define("DEBUG", false);

// END CONFIG
