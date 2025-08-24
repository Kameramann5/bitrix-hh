<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @global CUser $USER */
?>
<section class="about-one">
    <img class="about-bg" src="<?=SITE_TEMPLATE_PATH ?>/assets/img/about/bg.svg" alt="фон">
    <img class="about-bg-two" src="<?=SITE_TEMPLATE_PATH ?>/assets/img/about/bg2.svg" alt="фон">
    <div class="container">
        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() ."inc/text.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>
        <div class="row">
            <div class="col-md about-one-left">
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/desc.php", [], ["NAME" => "описание", "TEMPLATE" => "file_inc.php"])?>
            </div>
            <div class="col-md about-one-right">

                <img src="<?=$arParams['IMG_ONE']?>" alt="картинка">

            </div>
        </div>
    </div>
</section>
<section class="about-two">
    <img class="about-bg" src="<?=SITE_TEMPLATE_PATH ?>/assets/img/about/bg3.svg" alt="фон">
    <img class="about-bg-two" src="<?=SITE_TEMPLATE_PATH ?>/assets/img/about/bg4.svg" alt="фон">
    <div class="container">
        <div class="row">
            <div class="col-md about-two-left order-2 order-md-1">
                <img src="<?=$arParams['IMG_TWO']?>" alt="картинка">
            </div>
            <div class="col-md about-two-right order-1 order-md-2">
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/text2.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/desc2.php", [], ["NAME" => "описание", "TEMPLATE" => "file_inc.php"])?>
            </div>
        </div>
    </div>
</section>
<section class="about-three">
    <img class="about-bg" src="<?=SITE_TEMPLATE_PATH ?>/assets/img/about/bg5.svg" alt="фон">
    <img class="about-bg-two" src="<?=SITE_TEMPLATE_PATH ?>/assets/img/about/bg6.svg" alt="фон">
    <div class="container">
        <div class="row">
            <div class="col-md about-three-right">
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/text3.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/desc3.php", [], ["NAME" => "описание", "TEMPLATE" => "file_inc.php"])?>
            </div>
            <div class="col-md about-three-left">
                <img src="<?=$arParams['IMG_THREE']?>" alt="картинка">
            </div>
        </div>
    </div>
</section>


<section class="about-five gallery">
    <div class="container hero-block-five">
        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/title_gallery.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>

        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "gallery",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_DATE" => "N",
                "DISPLAY_NAME" => "N",
                "DISPLAY_PICTURE" => "N",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("", ""),
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "4",
                "IBLOCK_TYPE" => "party",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "N",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => "invisible-preloader",
                "PAGER_TITLE" => "",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array("PLACE", "BIG_IMG", "SMALL_IMG", "SMALL_IMG_TWO", "", ""),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N"
            )
        );?>
</section>

<section class="about-four" >
    <img class="about-bg" src="<?=SITE_TEMPLATE_PATH ?>/assets/img/about/bg7.svg" alt="фон">
    <img class="about-bg-two" src="<?=SITE_TEMPLATE_PATH ?>/assets/img/about/bg8.svg" alt="фон">
    <div class="container" id="about_contacts">
        <div class="row">
            <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/text4.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>
            <div class="col-lg about-four-left">
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/iframe.php", [], ["NAME" => "iframe", "TEMPLATE" => "file_inc.php"])?>
                <div class="col-lg about-four-right">
                    <div class="tel-city">

                        <?$APPLICATION->IncludeFile(SITE_DIR."include/main/tel.php", [], ["NAME" => "телефон", "TEMPLATE" => "file_inc.php"])?>



                        <div class="city">        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/city.php", [], ["NAME" => "город", "TEMPLATE" => "file_inc.php"])?>
                        </div>
                    </div>
                    <div class="time">
                        <div class="time-one">
                            <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/time-one.php", [], ["NAME" => "текст", "TEMPLATE" => "file_inc.php"])?>
                        </div>
                        <div class="time-span">
                            <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/time-span.php", [], ["NAME" => "текст", "TEMPLATE" => "file_inc.php"])?>
                        </div>
                        <p class="time-two">
                            <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/time-two.php", [], ["NAME" => "текст", "TEMPLATE" => "file_inc.php"])?>
                        </p>
                        <ul>
                            <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/timework.php", [], ["NAME" => "время работы", "TEMPLATE" => "file_inc.php"])?>
                        </ul>
                    </div>
                    <div class="social">
                        <?php if ($arParams['NETWORK_IMG_ONE']) { ?><a target="_blank" href="<?=$arParams['NETWORK_URL_ONE']?>"><img src="<?=$arParams['NETWORK_IMG_ONE']?>" alt="<?=$arParams['NETWORK_NAME_ONE']?>" title="<?=$arParams['NETWORK_NAME_ONE']?>"></a>
                        <?php } ?>
                        <?php if ($arParams['NETWORK_IMG_TWO']) { ?><a target="_blank" href="<?=$arParams['NETWORK_URL_TWO']?>"><img src="<?=$arParams['NETWORK_IMG_TWO']?>" alt="<?=$arParams['NETWORK_NAME_TWO']?>" title="<?=$arParams['NETWORK_NAME_TWO']?>"></a>
                        <?php } ?>
                        <?php if ($arParams['NETWORK_IMG_THREE']) { ?><a target="_blank" href="<?=$arParams['NETWORK_URL_THREE']?>"><img src="<?=$arParams['NETWORK_IMG_THREE']?>" alt="<?=$arParams['NETWORK_NAME_THREE']?>" title="<?=$arParams['NETWORK_NAME_THREE']?>"></a>
                        <?php } ?>
                        <?php if ($arParams['NETWORK_IMG_FOUR']) { ?><a target="_blank" href="<?=$arParams['NETWORK_URL_FOUR']?>"><img src="<?=$arParams['NETWORK_IMG_FOUR']?>" alt="<?=$arParams['NETWORK_NAME_FOUR']?>" title="<?=$arParams['NETWORK_NAME_FOUR']?>"></a>
                        <?php } ?>
                        <?php if ($arParams['NETWORK_IMG_FIVE']) { ?><a target="_blank" href="<?=$arParams['NETWORK_URL_FIVE']?>"><img src="<?=$arParams['NETWORK_IMG_FIVE']?>" alt="<?=$arParams['NETWORK_NAME_FIVE']?>" title="<?=$arParams['NETWORK_NAME_FIVE']?>"></a>
                        <?php } ?>
                        <?php if ($arParams['NETWORK_IMG_SIX']) { ?><a target="_blank" href="<?=$arParams['NETWORK_URL_SIX']?>"><img src="<?=$arParams['NETWORK_IMG_SIX']?>" alt="<?=$arParams['NETWORK_NAME_SIX']?>" title="<?=$arParams['NETWORK_NAME_SIX']?>"></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</section>