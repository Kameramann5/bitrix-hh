<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @global CMain $APPLICATION */
use Bitrix\Main\Page\Asset;
$asset = Asset::getInstance();
$asset->addCss(SITE_TEMPLATE_PATH."/style.css");
$asset->addCss(SITE_TEMPLATE_PATH."/template_style.css");
$asset->addCss(MAIN_TEMPLATE_PATH."/assets/css/bootstrap-grid.min.css");
$asset->addCss(MAIN_TEMPLATE_PATH."assets/css/jquery.fancybox.min.css");
$asset->addJs(MAIN_TEMPLATE_PATH."assets/js/jquery.fancybox.min.js");
CJSCore::Init();
CJSCore::Init(["jquery3"]);
\Bitrix\Main\UI\Extension::load([
    "custom.fonts.Mulish"
])
?>
    <!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
    <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="format-detection" content="telephone=no">
        <title><?$APPLICATION->ShowTitle()?></title>
        <?$APPLICATION->ShowHead()?>
    </head>
<body>
<?$APPLICATION->ShowPanel()?>
<?php
$page = $APPLICATION->GetCurPage();
if( $page!="/") {   ?>
    <header class="main-header">
        <?$APPLICATION->IncludeFile(SITE_DIR."include/main/header/logo.php", [], ["NAME" => "лого", "TEMPLATE" => "file_inc.php"])?>
        <div class="header-left">
            <div class="header-left-inner">
                <div  class="header-left-inner-p">
                    <?$APPLICATION->IncludeFile(SITE_DIR."include/main/header/left_text.php", [], ["NAME" => "текст", "TEMPLATE" => "file_inc.php"])?>
                </div>
            </div>
        </div>
        <div class="header-right">
            <div class="header-right-inner">
                <div  class="header-right-inner-p">
                    <?$APPLICATION->IncludeFile(SITE_DIR."include/main/header/right_text.php", [], ["NAME" => "текст", "TEMPLATE" => "file_inc.php"])?>
                </div>
            </div>
        </div>
    </header>
    <main>
    <?$APPLICATION->IncludeComponent(
        "bitrix:breadcrumb",
        "breadcrumb",
        Array(
            "PATH" => "",
            "SITE_ID" => "s1",
            "START_FROM" => "0"
        )
    );?>
<?php  } ?>