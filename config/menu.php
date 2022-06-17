<?php

return [
    'dashboard' => 'default/index',
    'master'    => [
        'tipe pengajuan' => 'crud/index&table=purpose_types',
        'jenis pendanaan' => 'crud/index&table=funding_types',
        'mata uang' => 'crud/index&table=currencies',
        'akun bank' => 'crud/index&table=bank_accounts',
        'satuan' => 'crud/index&table=units',
    ],
    'manajemen pengajuan' => 'purposes/index',
    'laporan'   => 'reports/index',
    'pengguna'  => [
        'semua pengguna' => 'users/index',
        'roles' => 'roles/index'
    ],
    'pengaturan' => 'application/index'
];