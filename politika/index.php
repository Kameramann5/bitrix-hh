<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Политика конфиденциальности");
?>


<?$APPLICATION->IncludeComponent(
    "custom:politika",
    "",
    array(
    ),
    false,
    array("HIDE_ICONS" => "Y")
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>





