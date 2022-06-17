<?php
Page::set_title('Tambah Pengajuan');
$table = 'purposes';
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');
if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);

    $_POST['purposes']['user_id'] = auth()->user->id;

    $_POST['purposes']['status'] = 'draft';
    
    $purpose = $db->insert('purposes',$_POST['purposes']);

    set_flash_msg(['success'=>'Pengajuan berhasil ditambahkan']);
    header('location:'.routeTo('purposes/view',['id' => $purpose->id]));
}

return compact('table','error_msg','old');