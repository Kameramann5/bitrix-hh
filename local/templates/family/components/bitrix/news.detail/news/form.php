<section class="form_zakaz">
    <img class="bg" src="<?=SITE_TEMPLATE_PATH?>/assets/img/holiday/zakaz.svg" alt="фон">
    <img class="bg-two" src="<?=SITE_TEMPLATE_PATH?>/assets/img/holiday/zakaz2.svg" alt="фон">
    <img class="mob-bg" src="<?=SITE_TEMPLATE_PATH?>/assets/img/holiday/zakaz3.svg" alt="фон">
    <img class="mob-bg-two" src="<?=SITE_TEMPLATE_PATH?>/assets/img/holiday/zakaz4.svg" alt="фон">
    <?php
    $rsSites = CSite::GetByID(SITE_ID);
    $arSite = $rsSites->Fetch();
    $strEmail = $arSite['EMAIL'];
    ?>
    <?$APPLICATION->IncludeComponent(
    "custom:main.feedback",
    "news.detail",
    Array(
        "EMAIL_TO" => $strEmail,
        "EVENT_MESSAGE_ID" => array("7"),
        "OK_TEXT" => "Успешно отправлено!",
        "REQUIRED_FIELDS" => array("NAME","PHONE"),
        "USE_CAPTCHA" => "N",
        "AJAX_MODE" => "Y",
    )
);?>
</section>
