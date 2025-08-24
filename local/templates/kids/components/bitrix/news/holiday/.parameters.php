<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arTemplateParameters = [
    'ACTIVE' => [
        'NAME' => 'Активность календаря',
        'TYPE' => 'CHECKBOX',
        "DEFAULT"   =>  "Y"
    ],
    'IMG_ONE' => [
        'NAME' => 'Картинка если календарь не активен',
        'TYPE' => 'FILE',
        "FD_EXT" => "png,gif,jpg,jpeg,svg",
        "FD_UPLOAD" => true,
        "FD_USE_MEDIALIB" => true,
        "FD_MEDIALIB_TYPES"=> Array(
            'image',
        ),
    ],


];