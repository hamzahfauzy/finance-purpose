<?php

$conn = conn();
$db   = new Database($conn);
$user = auth()->user;

$db->update('purposes',[
    'status' => 'ditolak',
    'notes'  => $_GET['reason'],
    'action_by' => $user->name
],[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Proposal berhasil ditolak']);
header('location:'.routeTo('purposes/view',['id' => $_GET['id']]));
die();