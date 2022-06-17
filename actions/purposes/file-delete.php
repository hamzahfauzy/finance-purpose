<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('purpose_files',[
    'id' => $_GET['id']
]);

$db->delete('purpose_files',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Berkas pada pengajuan berhasil dihapus']);
header('location:'.routeTo('purposes/view',['id' => $data->purpose_id]));
die();