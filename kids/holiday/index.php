<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Праздники");
?>
<?$APPLICATION->IncludeComponent(
    "custom:holiday",
    "",
    array(
    ),
    false,
    array("HIDE_ICONS" => "Y")
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>