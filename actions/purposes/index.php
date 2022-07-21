<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
Page::set_title('Pengajuan');
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

return [
    'datas' => $data,
    'success_msg' => $success_msg
];