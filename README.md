# guacamole-connect
the docker guacamole test, you can get web VNC by WebSocket,and also other proxy in your browser.

## how to do

* build or pull form hub.docker.com
* start docker client
* get token of you vnc or other proxy(e.g. rdp telnet ssh) by setting
* include script jQuery and guac.js
* at last, you will take it on you screen :)

### build docker in Dockerfile

```
docker build -t "docker.io/dongshufeng/guacamole-connect:latest" .
```

### start docker

the env of SecretKey is 32 bytes

```
sh boot.sh <SecretKey>

```

### token test by PHP

modiyf $secretKey take from step forward

[get token](https://github.com/Dshufeng/guacamole-connect/tree/master/example/guac.php)

### html and js test

```
	var display = $("#you-displayElement-id");
	var guac = new Guacamole.Client(
	    new Guacamole.WebSocketTunnel("ws://ip:port");
	);

	display.appendChild(dis);

	// Error handler
	guac.onerror = function(error) {
	    console.log(error);
	};

	// Connect
	guac.connect('token='+token);
```


##　Doument and API of guacamole

http://guacamole.apache.org/

##　Inspired and Thx

https://github.com/vadimpronin/guacamole-lite
