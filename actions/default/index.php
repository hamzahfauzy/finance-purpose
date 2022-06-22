<?php

Page::set_title('Dashboard');

$conn = conn();
$db   = new Database($conn);

$statistikPengajuan = [
    'total' => $db->count('purposes',['status'=>['<>','draft']]),
    'pending' => $db->count('purposes',['status'=>'diajukan']),
    'diterima' => $db->count('purposes',['status'=>'diterima']),
    'ditolak' => $db->count('purposes',['status'=>'ditolak']),
];

$statistikAnggaran = [
    'total' => $db->sum('(SELECT SUM(purpose_items.qty*purpose_items.price) FROM purpose_items WHERE purpose_items.purpose_id = purposes.id)','purposes',['purposes.status'=>['<>','draft']]),
    'pending' => $db->sum('(SELECT SUM(purpose_items.qty*purpose_items.price) FROM purpose_items WHERE purpose_items.purpose_id = purposes.id)','purposes',['purposes.status'=>'diajukan']),
    'diterima' => $db->sum('(SELECT SUM(purpose_items.qty*purpose_items.price) FROM purpose_items WHERE purpose_items.purpose_id = purposes.id)','purposes',['purposes.status'=>'diterima']),
    'ditolak' => $db->sum('(SELECT SUM(purpose_items.qty*purpose_items.price) FROM purpose_items WHERE purpose_items.purpose_id = purposes.id)','purposes',['purposes.status'=>'ditolak']),
];

return compact(
    'statistikPengajuan',
    'statistikAnggaran'
);