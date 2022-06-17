<?php

$conn = conn();
$db   = new Database($conn);
$user = auth()->user;

$db->update('purposes',[
    'status' => 'diterima',
    'action_by' => $user->name
],[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Proposal berhasil diterima']);
header('location:'.routeTo('purposes/view',['id' => $_GET['id']]));
die();