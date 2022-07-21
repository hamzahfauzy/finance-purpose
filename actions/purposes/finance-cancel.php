<?php

$conn = conn();
$db   = new Database($conn);
$user = auth()->user;

$db->update('purposes',[
    'status_dana' => 'Dibatalkan',
    'note_status_dana'  => $_GET['reason'],
    'status_dana_action_by' => $user->name
],[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Status dana dibatalkan']);
header('location:'.routeTo('purposes/view',['id' => $_GET['id']]));
die();