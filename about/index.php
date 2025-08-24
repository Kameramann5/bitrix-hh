<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О нас");

?>
<?$APPLICATION->IncludeComponent(
    "custom:about",
    "",
    Array(
        "IMG_ONE" => "/upload/medialibrary/bdf/7ot51oi0nqrw5wwa2xzdy1mxehr71d5t.jpg",
        "IMG_THREE" => "/upload/medialibrary/d38/kg04ml2vs8nhpo4nq2fo1usd3t5r0wci.jpg",
        "IMG_TWO" => "/upload/medialibrary/9bc/mu8xu2ppqfl9hakz5yrvzrwvgix6cj2p.jpg",
        "NETWORK_IMG_FIVE" => "",
        "NETWORK_IMG_FOUR" => "/upload/medialibrary/6f8/1xecyqjic8g2o2smwqx28dvswdmug5uu.svg",
        "NETWORK_IMG_ONE" => "/upload/medialibrary/70f/g8f23wmfdfzd8g4170jw7sc5kvfi7zzg.svg",
        "NETWORK_IMG_SIX" => "",
        "NETWORK_IMG_THREE" => "/upload/medialibrary/e42/zdktl71p970eb9m68besqkceo138v5ye.svg",
        "NETWORK_IMG_TWO" => "/upload/medialibrary/aa1/jcji8ri21qvoftcf8u5t065qzpb098iw.svg",
        "NETWORK_NAME_FIVE" => "",
        "NETWORK_NAME_FOUR" => "яндекс карты",
        "NETWORK_NAME_ONE" => "Whatsapp",
        "NETWORK_NAME_SIX" => "",
        "NETWORK_NAME_THREE" => "2gis",
        "NETWORK_NAME_TWO" => "vk",
        "NETWORK_URL_FIVE" => "",
        "NETWORK_URL_FOUR" => "",
        "NETWORK_URL_ONE" => "https://wa.me/79178806080",
        "NETWORK_URL_SIX" => "",
        "NETWORK_URL_THREE" => "https://2gis.ru/kazan/firm/70000001076508296",
        "NETWORK_URL_TWO" => "https://vk.com/barto.family"
    ),
    false,
    Array(
        'HIDE_ICONS' => 'Y'
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>





