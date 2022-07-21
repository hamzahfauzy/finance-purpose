<?php

Page::set_title('Dashboard');

$conn = conn();
$db   = new Database($conn);

$user = auth()->user;

if(get_role($user->id)->name == 'user')
{
    $statistikPengajuan = [
        'total' => $db->count('purposes',['status'=>['<>','draft'],'user_id'=>$user->id]),
        'pending' => $db->count('purposes',['status'=>'diajukan','user_id'=>$user->id]),
        'diterima' => $db->count('purposes',['status'=>'diterima','user_id'=>$user->id]),
        'ditolak' => $db->count('purposes',['status'=>'ditolak','user_id'=>$user->id]),
    ];
    
    $statistikAnggaran = [
        'total' => $db->sum('(SELECT SUM(purpose_items.qty*purpose_items.price) FROM purpose_items WHERE purpose_items.purpose_id = purposes.id)','purposes',['purposes.status'=>['<>','draft'],'user_id'=>$user->id]),
        'pending' => $db->sum('(SELECT SUM(purpose_items.qty*purpose_items.price) FROM purpose_items WHERE purpose_items.purpose_id = purposes.id)','purposes',['purposes.status'=>'diajukan','user_id'=>$user->id]),
        'diterima' => $db->sum('(SELECT SUM(purpose_items.qty*purpose_items.price) FROM purpose_items WHERE purpose_items.purpose_id = purposes.id)','purposes',['purposes.status'=>'diterima','user_id'=>$user->id]),
        'ditolak' => $db->sum('(SELECT SUM(purpose_items.qty*purpose_items.price) FROM purpose_items WHERE purpose_items.purpose_id = purposes.id)','purposes',['purposes.status'=>'ditolak','user_id'=>$user->id]),
    ];
}
else
{
    $statistikPengajuan = [
        'total' => $db->count('purposes',['status'=>['<>','draft']]),
        'pending' => $db->count('purposes',['status'=>'diajukan']),
        'diterima' => $db->count('purposes',['status'=>'diterima']),
        'ditolak' => $db->count('purposes',['status'=>'ditolak']),
    ];
    
    $statistikAnggaran = [
        'total' => $db->sum('(SELECT SUM(purpose_items.qty*purpose_items.price) FROM purpose_items WHERE purpose_items.purpose_id = purposes.id)','purposes',['purposes.status'=>['<>','draft']]),
        'pending' => $db->sum('(SELECT SUM(purpose_items.qty*purpose_items.price) FROM purpose_items WHERE purpose_items.purpose_id = purposes.id)','purposes',['purposes.status'=>'diajukan']),
        'diterima' => $db->sum('(SELECT SUM(purpose_items.qty*purpose_items.price) FROM purpose_items WHERE purpose_items.purpose_id = purposes.id)','purposes',['purposes.status'=>'diterima']),
        'ditolak' => $db->sum('(SELECT SUM(purpose_items.qty*purpose_items.price) FROM purpose_items WHERE purpose_items.purpose_id = purposes.id)','purposes',['purposes.status'=>'ditolak']),
    ];
}

return compact(
    'statistikPengajuan',
    'statistikAnggaran'
);