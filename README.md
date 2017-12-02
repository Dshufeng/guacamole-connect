# go-to-guac
the docker guacamole test, you can get web VNC by WebSocket,and also other proxy in your browser.

## how to

* start docker api
* get token of you vnc or other proxy(e.g. rdp telnet ssh)
* include script jQuery and all.min.js
* at last, you will take it on you screen :)



### start docker
```
docker run -d -p 8080:8080 docker.io/dongshufeng/my-guacamole

```

### token test by PHP

```

    $config = [
        "connection"=>[
            "type"=>"vnc",
            "settings"=>[
                "hostname"=>"192.168.1.209", // the vnc server ip
                "port"=>5900,				// the vnc server port
                "password"=>"vncpassword"   // the vnc server psssword
            ]
        ]
    ];

    $iv= substr(md5("cepo"),8,16);
    $value = \openssl_encrypt(
        json_encode($config),
        'AES-256-CBC',
        'MySuperSecretKeyForParamsToken12',
        0,
        $iv
    );

    if ($value === false) {
        throw new \Exception('Could not encrypt the data.');
    }

    $data = [
        'iv' => base64_encode($iv),
        'value' => $value,
    ];

    $json = json_encode($data);

    if (!is_string($json)) {
        throw new \Exception('Could not encrypt the data.');
    }

    // you token
    echo base64_encode($json);

```

### html and js test

```
	var display = $("#you-displayElement-id");
	var guac = new Guacamole.Client(
	    new Guacamole.WebSocketTunnel("ws://docker-ip:port");
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