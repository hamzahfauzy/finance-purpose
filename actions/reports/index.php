<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
Page::set_title('Laporan');

$db->query = "SELECT * FROM purposes WHERE status <> 'draft'";
$data = $db->exec('all');

$data = array_map(function($d) use ($db){
    $d->user = $db->single('users',['id' => $d->user_id]);
    $d->total_rincian = $db->sum('qty * price','purpose_items',['purpose_id' => $d->id]);
    return $d;
}, $data);

return [
    'datas' => $data,
    'success_msg' => $success_msg
];