<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Меню");
?>
<?$APPLICATION->IncludeComponent(
    "custom:menu-kids",
    "",
    array(
    ),
    false,
    array("HIDE_ICONS" => "Y")
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>