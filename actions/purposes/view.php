<?php

$conn = conn();
$db   = new Database($conn);
Page::set_title('Detail Pengajuan');
$user_id = auth()->user->id;

$data = $db->single('purposes',[
    'id' => $_GET['id'],
    'user_id' => $user_id
]);

$items = $db->all('purpose_items',[
    'purpose_id' => $_GET['id']
]);

$files = $db->all('purpose_files',[
    'purpose_id' => $_GET['id']
]);

$success_msg = get_flash_msg('success');

if(request() == 'POST')
{
    $db->insert('purpose_items',$_POST['purpose_items']);

    set_flash_msg(['success'=>'Item pada Pengajuan berhasil diupdate']);
    header('location:'.routeTo('purposes/view',['id'=>$_GET['id']]));
}

return compact('data','items','success_msg', 'files');