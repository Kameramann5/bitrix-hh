<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

CHTTP::SetStatus("404 Not Found");
$APPLICATION->SetTitle("404 Не найдено");
@define("ERROR_404","Y");
?>
<?$APPLICATION->IncludeComponent(
    "custom:page-404",
    "",
    array(
    ),
    false,
    array("HIDE_ICONS" => "Y")
);?>


<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php") ?>