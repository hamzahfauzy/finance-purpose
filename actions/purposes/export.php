<?php

$conn = conn();
$db   = new Database($conn);

$user = auth()->user;
$db->query = "SELECT * FROM purposes";

if(get_role($user->id)->name != 'user')
{
    $db->query .= " WHERE status <> 'draft'";
}
else
{
    $db->query .= " WHERE user_id = '$user->id'";
}

$data = $db->exec('all');

$data = array_map(function($d) use ($db){
    $d->ticket = 'PUR-'.$d->id.'.'.$d->user_id.'.'.$d->purpose_type_id;
    $d->total_rincian = $db->sum('qty * price','purpose_items',['purpose_id' => $d->id]);
    return $d;
}, $data);

$rows = [
    [
        '#',
        'No. Tiket',
        'Deskripsi',
        'Bank',
        'Jumlah',
        'Status',
        'Status Dana',
        'Catatan'
    ]
];
foreach($data as $index => $d)
{
    $rows[] = [
        $index,
        $data->ticket,
        $data->description,
        $data->bank_account,
        number_format($data->total_rincian),
        $data->status.' '.($data->notes?'('.$data->notes.')':''),
        $data->status_dana.' '.($data->note_status_dana?'('.$data->note_status_dana.')':''),
        $data->remark,
    ];
}

array_to_csv_download($rows, "laporan-".date('Y-m-d H:i:s').".csv",",");

die();