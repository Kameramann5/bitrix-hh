<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @global CUser $USER */


?>
<style>footer {margin-top: 0} .bx-breadcrumb{display: none}</style>
<section class="page404">
    <img class="bg404" src="/local/templates/main/assets/img/404bg.svg"  alt="404">
    <img class="bg404-2" src="/local/templates/main/assets/img/404bg-2.svg"  alt="404">
    <div class="container">
        <div class="row  page404-content">
            <div class="col-lg order-2 order-lg-1">
                <?$APPLICATION->IncludeFile(SITE_DIR."include/404/text.php", [], ["NAME" => "текст", "TEMPLATE" => "file_inc.php"])?>
                <?$APPLICATION->IncludeFile(SITE_DIR."include/404/text2.php", [], ["NAME" => "текст 2", "TEMPLATE" => "file_inc.php"])?>
                <?$APPLICATION->IncludeFile(SITE_DIR."include/404/text3.php", [], ["NAME" => "текст 3", "TEMPLATE" => "file_inc.php"])?>
            </div>
            <div class="col-lg img404 order-1 order-lg-2">
                <?$APPLICATION->IncludeFile(SITE_DIR."include/404/img.php", [], ["NAME" => "картинка", "TEMPLATE" => "file_inc.php"])?>
            </div>
        </div>
    </div>
</section>