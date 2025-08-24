<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");

?>
<?$APPLICATION->IncludeComponent(
    "custom:adults",
    "",
    array(
        "BIG_IMG" => "/upload/medialibrary/2b9/x271sh2ratmclxcmni1hcqn8xdt3tij2.png",
        "IMG_TWO" => "/upload/medialibrary/4ed/av01j2qq2uyq70e2vzs28pofobo6jltb.png",
        "IMG_THREE" => "/upload/medialibrary/b9b/mxkw9zfv7e4avnp7k2pqy68w2y00cj18.png",
        "IMG_FOUR" => "/upload/medialibrary/c74/jld5l2jsvkyxsx2cer0b0vmf68co1w30.png",
    ),
    false,
    array("HIDE_ICONS" => "Y")
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>