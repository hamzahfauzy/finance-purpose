<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
Page::set_title('Pengajuan');
$db->query = "SELECT * FROM purposes JOIN purpose_items ON purpose_items.purpose_id = purposes.id";

if(get_role(auth()->user->id)->name != 'user')
{
    $db->query .= " AND purposes.status <> 'draft'";
}

$data = $db->exec('all');

$data = array_map(function($d) use ($db){
    $d->total_rincian = $db->sum('amount','purpose_items');
    return $d;
}, $data);

return [
    'datas' => $data,
    'success_msg' => $success_msg
];