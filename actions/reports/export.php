<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$db->query = "SELECT * FROM purposes WHERE status <> 'draft'";
$data = $db->exec('all');

$data = array_map(function($d) use ($db){
    $d->user = $db->single('users',['id' => $d->user_id]);
    $d->total_rincian = $db->sum('qty * price','purpose_items',['purpose_id' => $d->id]);
    return $d;
}, $data);

$rows = [
    ['No','Tanggal','Deskripsi','Divisi','NamaUser','Status']
];
foreach($data as $index => $d)
{
    $rows[] = [
        $index,
        date('Y-m-d',strtotime($d->created_at)),
        $d->description,
        $d->funding_type,
        $d->user->name,
        $d->status
    ];
}

array_to_csv_download($rows, "laporan-".date('Y-m-d H:i:s').".csv",",");

die();