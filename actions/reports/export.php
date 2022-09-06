<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$db->query = "SELECT * FROM purposes WHERE status <> 'draft'";
$data = $db->exec('all');

$data = array_map(function($d) use ($db){
    $d->ticket = 'PUR-'.$d->id.'.'.$d->user_id.'.'.$d->purpose_type_id;
    $d->user = $db->single('users',['id' => $d->user_id]);
    $d->purpose_type = $db->single('purpose_types',['id' => $d->purpose_type_id]);
    $d->total_rincian = $db->sum('qty * price','purpose_items',['purpose_id' => $d->id]);
    return $d;
}, $data);

$rows = [
    ['No','Tiket','Tanggal','Divisi','NamaUser','Deskripsi','TipePengajuan','Bank','Jumlah','Status']
];
foreach($data as $index => $d)
{
    $rows[] = [
        $index,
        $d->ticket,
        date('Y-m-d',strtotime($d->created_at)),
        $d->funding_type,
        $d->user->name,
        $d->description,
        $d->purpose_type->name,
        $d->bank_account,
        $d->total_rincian,
        $d->status,
    ];
}

array_to_csv_download($rows, "laporan-".date('Y-m-d H:i:s').".csv",",");

die();