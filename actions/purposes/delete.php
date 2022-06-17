<?php

$conn = conn();
$db   = new Database($conn);
$user_id = auth()->user->id;
$db->delete('purposes',[
    'id' => $_GET['id'],
    'user_id' => $user_id
]);

set_flash_msg(['success'=>'Pengajuan berhasil dihapus']);
header('location:'.routeTo('purposes/index'));
die();