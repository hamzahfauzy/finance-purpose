<?php

// all config files
$files = [
    'icon_menu',
    'lang',
    'main',
    'menu',
    'tablefields'
];

foreach($files as $file)
{
    if(!file_exists('config/'.$file.'.php'))
    {
        copy('config/'.$file.'.example','config/'.$file.'.php');
    }
}

mkdir('public/uploads');
mkdir('public/uploads/purposes');

echo "Init Config File Success\n";
echo "Please config the following file in config folder (".(implode('.php, ',$files)).")\n";