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
        $d->ticket,
        $d->description,
        $d->bank_account,
        number_format($d->total_rincian),
        $d->status.' '.($d->notes?'('.$d->notes.')':''),
        $d->status_dana.' '.($d->note_status_dana?'('.$d->note_status_dana.')':''),
        $d->remark,
    ];
}

array_to_csv_download($rows, "laporan-".date('Y-m-d H:i:s').".csv",",");

die();