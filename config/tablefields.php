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
        'request_amount' => [
            'label' => 'Jumlah',
            'type'  => 'number',
        ],
        'request_amount_idr' => [
            'label' => 'Jumlah dalam IDR',
            'type'  => 'number',
        ],
        'bank_account_id' => [
            'label' => 'Akun Bank',
            'type'  => 'options-obj:bank_accounts,id,function($e){return $e->bank_name." (".$e->account_number.")"; };',
        ],
        'funding_type' => [
            'label' => 'Jenis Pendanaan',
            'type'  => 'options-obj:funding_types,name,name',
        ],
        'description' => [
            'label' => 'Deskripsi',
            'type'  => 'text',
        ],
        'remark' => [
            'label' => 'Remark',
            'type'  => 'text',
        ]
    ]
];