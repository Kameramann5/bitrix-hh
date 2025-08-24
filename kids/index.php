<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");

?>
<?$APPLICATION->IncludeComponent(
    "custom:kids",
    "",
    array(
        "BIG_IMG" => "/upload/medialibrary/1c9/2dfx9us07e34zkubnqputemf4jw045js.png",
        "IMG_TWO" => "/upload/medialibrary/e6d/bqq9yrl3jfmnr22uqvmyafdazkyp2snf.png",
        "IMG_THREE" => "/upload/medialibrary/f98/mjddjany13c9rxf1rzmk4pajuvclok7q.png",
        "IMG_FOUR" => "/upload/medialibrary/275/5j18x355esnkuz5aohyyox9tjk1h9lm0.png",
    ),
    false,
    array("HIDE_ICONS" => "Y")
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>