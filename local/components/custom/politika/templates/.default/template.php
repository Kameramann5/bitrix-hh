<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @global CUser $USER */
?>
<section class="politika">
    <div class="container">
        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() ."inc/text.php", [], ["NAME" => "текст 1", "TEMPLATE" => "file_inc.php"])?>
        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() ."inc/text2.php", [], ["NAME" => "текст 2", "TEMPLATE" => "file_inc.php"])?>
   </div>
</section>