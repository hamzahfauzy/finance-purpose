<?php

Page::set_title('Dashboard');

$conn = conn();
$db   = new Database($conn);

$statistikPengajuan = [
    'total' => $db->count('purposes'),
    'pending' => $db->count('purposes',['status'=>'diajukan']),
    'diterima' => $db->count('purposes',['status'=>'diterima']),
    'ditolak' => $db->count('purposes',['status'=>'ditolak']),
];

$statistikAnggaran = [
    'total' => $db->sum('request_amount_idr','purposes'),
    'pending' => $db->sum('request_amount_idr','purposes',['status'=>'diajukan']),
    'diterima' => $db->sum('request_amount_idr','purposes',['status'=>'diterima']),
    'ditolak' => $db->sum('request_amount_idr','purposes',['status'=>'ditolak']),
];

return compact(
    'statistikPengajuan',
    'statistikAnggaran'
);