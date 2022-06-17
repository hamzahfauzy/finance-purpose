<?php

$conn = conn();
$db   = new Database($conn);
Page::set_title('Edit Pengajuan');
$user_id = auth()->user->id;
$data = $db->single('purposes',[
    'id' => $_GET['id'],
    'user_id' => $user_id
]);

if(request() == 'POST')
{
    $db->update('purposes',$_POST['purposes'],[
        'id' => $_GET['id']
    ]);

    set_flash_msg(['success'=>'Pengajuan berhasil diupdate']);
    header('location:'.routeTo('purposes/view',['id'=>$_GET['id']]));
}

return [
    'data' => $data
];