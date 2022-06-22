<?php

$conn = conn();
$db   = new Database($conn);
$user = auth()->user;

$purpose = $db->single('purposes',[
    'id' => $_GET['id']
]);

$db->update('purposes',[
    'status' => $purpose->notes?'diterima':'diajukan',
    'notes'  => $purpose->notes?'':'menunggu approval ke 2',
    'action_by' => $purpose->action_by?$purpose->action_by.','.$user->name:$user->name
],[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Proposal berhasil diterima']);
header('location:'.routeTo('purposes/view',['id' => $_GET['id']]));
die();