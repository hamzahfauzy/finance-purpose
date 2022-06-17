<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('purpose_items',[
    'id' => $_GET['id']
]);

$db->delete('purpose_items',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Item pada pengajuan berhasil dihapus']);
header('location:'.routeTo('purposes/view',['id' => $data->purpose_id]));
die();