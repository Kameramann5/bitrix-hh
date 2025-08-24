<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
//$APPLICATION->SetTitle("Party новости");
?>
<?$APPLICATION->IncludeComponent(
    "custom:special_offers",
    "special_offers",
    array(
    ),
    false,
    array("HIDE_ICONS" => "Y")
);?>





<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>





