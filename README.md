# redis-stats


**Disclaimer**: This is a fork of **[tessus/redis-stats](https://github.com/tessus/redis-stats)**. This repo simply dockerizes it based on lightweight **[Trafex/docker-php-nginx](https://github.com/TrafeX/docker-php-nginx)**.

* Ready-to-use image is available from the **[Docker Hub](https://hub.docker.com/r/l33tlamer/redis-stats)** registry. Currently `amd64` only.

* Basic usage: `docker run -d --name redis-stats -v ./config.php:/var/www/html/config.php -p 8080:8080 l33tlamer/redis-stats`

* For Docker Compose a `docker-compose.example.yml` file exists in the root of this repo.

* The `config.php` file with Redis connection info is required. Copy the template from this repo or copy it out of a container: `docker cp redis-stats:/var/www/html/config.template.php ./config.php`


The following is the original readme:


## Features

- lightweight
- no PHP redis module required
- connection via IP/port or socket
- password support (including Redis 6 ACLs)
- show details
- flush database (async support)
- flush instance (async support)
- command mapping support (when rename-command is used on the server)
- auto refresh
- check for update

## Installation

```
git clone --depth 1 https://github.com/tessus/redis-stats.git
cd redis-stats
cp config.template.php config.php
```

## Configuration

### Server information

Servers are defined as an array. There are a few examples in the `config.template.php` file.

Field     | Type          | Description
----------|---------------|------------------------------------------------------------------
Name      | string        | name shown in drop-down list (also used for command mapping)
IP/Socket | string        | IP address or socket (`unix://`) of the server
Port      | integer       | port of server, use -1 for socket
Password  | string, array | credentials for the server (optional)<br>string: `password`<br>array: `['user', 'password']` for Redis ACLs

e.g.:

```
$servers = [
	[ 'Local', '127.0.0.1', 6379 ],
	[ 'Local socket', 'unix:///var/run/redis.sock', -1 ],
	[ 'Local with password', '127.0.0.1', 6379, 'password_here' ],
	[ 'Local with user and password', '127.0.0.1', 6379, ['username', 'password_here'] ],
];
```

### Misc options

Name             | Default   | Description
-----------------|-----------|---------------------------------------------------------------
FLUSHDB          | true      | Show a 'Flush' button for databases
CONFIRM_FLUSHDB  | true      | Ask for confirmation before flushing database
FLUSHALL         | true      | Show a 'Flush All' button for the instance
CONFIRM_FLUSHALL | true      | Ask for confirmation before flushing the entire instance
STATUS_LINE      | "bottom"  | Position of status line: "bottom" or "top"
CHECK_FOR_UPDATE | true      | Show a 'Check for update' button
DEBUG            | false     | debug mode - you don't want to set this to true!

### Command mapping

In case commands have been renamed on the server, there's support to map these commands in the config file.

e.g.:

```
$command = [
	'Local'    => [         // must be a server name (first field in server array, name shown in drop-down list)
		'FLUSHDB'  => 'fdb-5dea06694ff64',
		'FLUSHALL' => 'fa-5dea067c9bbd6',
		'AUTH'     => '',
		'INFO'     => '',
	],
];
```

## Screenshot

![](https://evermeet.cx/pub/img/redis-stats.png)

## Acknowledgements

I found the original script at https://gist.github.com/kabel/10023961

