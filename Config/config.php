<?php return
    [
        'table' => 'newsletters',
        'rules' => [
            'email' => 'required |email |unique:newsletters,email',
        ],
    ];