<?php

$conn = conn();
$db   = new Database($conn);
$user = auth()->user;

$db->update('purposes',[
    'status' => 'diajukan'
],[
    'id' => $_GET['id'],
    'user_id' => $user->id
]);

set_flash_msg(['success'=>'Proposal berhasil diajukan']);
header('location:'.routeTo('purposes/view',['id' => $_GET['id']]));
die();