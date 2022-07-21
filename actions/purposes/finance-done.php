<?php

$conn = conn();
$db   = new Database($conn);
$user = auth()->user;

$purpose = $db->single('purposes',[
    'id' => $_GET['id']
]);

$db->update('purposes',[
    'status_dana' => 'Selesai',
    'note_status_dana'  => 'Telah di tf/cash',
    'status_dana_action_by' => $user->name
],[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Status dana berhasil di ubah']);
header('location:'.routeTo('purposes/view',['id' => $_GET['id']]));
die();