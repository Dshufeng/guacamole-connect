<?php

$secretKey = 'secretKey';

$config = [
    "connection"=>[
        "type"=>"rdp",                      // proxy
        "settings"=>[
            "hostname"=>"192.168.1.207",    // server ip
            "port"=>3389,                   // server port
            "username"=>"user",             // server username
            "password"=>"changeme"          // server psssword
        ]
    ]
];

$iv= substr(md5("cepo"),8,16);
$value = \openssl_encrypt(
    json_encode($config),
    'AES-256-CBC',
    $secretKey,
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
