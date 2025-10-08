<?php

$siswa = [
    [
        'nama' => 'Cecep',
        'nilai' => 6
    ],
    [
        'nama' => 'Asep',
        'nilai' => 7
    ],
    [
        'nama' => 'Tatang',
        'nilai' => 8
    ],
    [
        'nama' => 'Oyat',
        'nilai' => 9
    ],
    [
        'nama' => 'Bambang',
        'nilai' => 10
    ]
];

$encoded_siswa = json_encode($siswa, JSON_PRETTY_PRINT);
file_put_contents('data/siswa.json', $encoded_siswa);

echo 'File berhasil di simpan';