<?php

return [
    'tblname'    => [
        'field1','field2'
    ],
    'purpose_types' => [
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ]
    ],
    'funding_types' => [
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ]
    ],
    'units' => [
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ]
    ],
    'currencies' => [
        'code' => [
            'label' => 'Kode',
            'type'  => 'text'
        ],
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ],
    ],
    'bank_accounts' => [
        'bank_name' => [
            'label' => 'Nama Bank',
            'type'  => 'text'
        ],
        'bank_address' => [
            'label' => 'Alamat Bank',
            'type'  => 'text'
        ],
        'holder_name'  => [
            'label' => 'Nama Akun',
            'type'  => 'text'
        ],
        'account_number'  => [
            'label' => 'No. Rekening',
            'type'  => 'text'
        ],
    ],
    'purposes' => [
        'purpose_type_id' => [
            'label' => 'Tipe Pengajuan',
            'type'  => 'options-obj:purpose_types,id,name',
        ],
        'currency_id' => [
            'label' => 'Mata Uang',
            'type'  => 'options-obj:currencies,id,name',
        ],
        'bank_account' => [
            'label' => 'Akun Bank',
            'type'  => 'text',
        ],
        'funding_type' => [
            'label' => 'Divisi',
            'type'  => 'options-obj:funding_types,name,name',
        ],
        'description' => [
            'label' => 'Deskripsi',
            'type'  => 'text',
        ],
        'remark' => [
            'label' => 'Catatan',
            'type'  => 'text',
        ],
        'created_at' => [
            'label' => 'Tanggal',
            'type'  => 'date',
        ]
    ]
];