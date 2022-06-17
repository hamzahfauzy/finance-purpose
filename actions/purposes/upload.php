<?php

$conn = conn();
$db   = new Database($conn);

if(request() == 'POST')
{
    if(isset($_FILES['file']) && !empty($_FILES['file']['name']))
    {
        $ext  = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $name = strtotime('now').'.'.$ext;
        $file = 'uploads/purposes/'.$name;
        copy($_FILES['file']['tmp_name'],$file);
        $_POST['purpose_files']['file_url'] = $file;
    }

    $purpose_id = $_POST['purpose_files']['purpose_id'];

    $db->insert('purpose_files',$_POST['purpose_files']);

    set_flash_msg(['success'=>'Pengajuan berhasil diupdate']);
    header('location:'.routeTo('purposes/view',['id' => $purpose_id]));
}