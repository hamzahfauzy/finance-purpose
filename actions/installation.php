<?php

if(request() == 'POST')
{
    $conn  = conn();
    $db    = new Database($conn);

    // save application installation
    $db->insert('application',$_POST['app']);

    // create user login
    $_POST['users']['name'] = "Admin ".$_POST['app']['name'];
    $_POST['users']['password'] = md5($_POST['users']['password']);
    $user = $db->insert('users',$_POST['users']);

    // create roles
    $role = $db->insert('roles',[
        'name' => 'super admin'
    ]);

    // assign role to user
    $db->insert('user_roles',[
        'user_id' => $user->id,
        'role_id' => $role->id
    ]);

    // create roles route
    $role = $db->insert('role_routes',[
        'role_id' => $role->id,
        'route_path' => '*'
    ]);

    $roles = [
        'admin' => [
            'default/*',
            'crud/*',
            'purposes/index',
            'purposes/view',
            'reports/*',
        ],
        'approval finance' => [
            'default/*',
            'purposes/index',
            'purposes/view',
            'purposes/approve',
            'purposes/decline',
        ],
        'user' => [
            'default/*',
            'purposes/index',
            'purposes/view',
            'purposes/edit',
            'purposes/delete',
            'purposes/purpose',
            'purposes/create',
            'purposes/upload',
            'purposes/item-delete',
            'purposes/file-delete',
        ]
    ];

    foreach($roles as $role_name => $routes)
    {
        $role = $db->insert('roles',[
            'name' => $role_name
        ]);

        foreach($routes as $route)
        {
            $db->insert('role_routes',[
                'role_id' => $role->id,
                'route_path' => $route
            ]);
        }
    }

    mkdir('uploads');
    mkdir('uploads/purposes');

    set_flash_msg(['success'=>'Instalasi Berhasil']);
    header('location:'.routeTo('auth/login'));
    die();

}