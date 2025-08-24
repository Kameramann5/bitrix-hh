<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @global CUser $USER */
?>
<?Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/assets/js/script.js")?>
<section class="index">
    <div class="container hero-block-one">
        <div class="hero-block" style="background-image: url('<?=$arParams['BIG_IMG']?>')">
            <div class="hero-block-zakaz">
                <img class="hero-block-zakaz-bg" src="<?=SITE_TEMPLATE_PATH?>/assets/img/index/bg.svg" alt="фон">

                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/block1_text.php", [], ["NAME" => "текст", "TEMPLATE" => "file_inc.php"])?>
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/block1_url.php", [], ["NAME" => "ссылка", "TEMPLATE" => "file_inc.php"])?>
            </div>
        </div>
    </div>
</section>
<section class="index">
    <div class="container hero-block-two">
        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/block2_title.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>
        <div class="row">
            <div class="col-lg"><?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/block2_desc.php", [], ["NAME" => "текст", "TEMPLATE" => "file_inc.php"])?></div>
            <div class="col-lg"><?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/block2_desc_two.php", [], ["NAME" => "текст", "TEMPLATE" => "file_inc.php"])?></div>
        </div>
    </div>
</section>
<section class="index">
    <div class="container hero-block-three">
<div class="row">
<div class="col-4 hero-block-three-part">  <img src="<?=$arParams['IMG_TWO']?>" alt="фон">
    <div class="hero-block-part-inner">
        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/block3_text.php", [], ["NAME" => "текст", "TEMPLATE" => "file_inc.php"])?>
        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/block3_url.php", [], ["NAME" => "ссылка", "TEMPLATE" => "file_inc.php"])?>
    </div>
</div>

    <div class="col-4 hero-block-three-part" > <img src="<?=$arParams['IMG_THREE']?>" alt="фон">
        <div class="hero-block-part-inner">
            <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/block3_text_two.php", [], ["NAME" => "текст", "TEMPLATE" => "file_inc.php"])?>
            <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/block3_url_two.php", [], ["NAME" => "ссылка", "TEMPLATE" => "file_inc.php"])?>
        </div>
    </div>
    <div class="col-4 hero-block-three-part">
        <img class="hero-block-three-part-bg" src="<?=SITE_TEMPLATE_PATH?>/assets/img/index/bg2.svg" alt="фон">
        <img src="<?=$arParams['IMG_FOUR']?>" alt="фон">
        <div class="hero-block-part-inner">
            <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/block3_text_three.php", [], ["NAME" => "текст", "TEMPLATE" => "file_inc.php"])?>
            <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/block3_url_three.php", [], ["NAME" => "ссылка", "TEMPLATE" => "file_inc.php"])?>
        </div>
    </div>
</div>








    </div>
</section>
<section class="index hero-block-four hero-block-four-section">
    <div  class=" hero-block-four-section">
        <div class="container hero-block-four">
            <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/block4_title.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>
        </div>
        <div>
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "main_slider",
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
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_DATE" => "N",
                    "DISPLAY_NAME" => "N",
                    "DISPLAY_PICTURE" => "N",
                    "DISPLAY_PREVIEW_TEXT" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array("PREVIEW_PICTURE", ""),
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "5",
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
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array("", ""),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER1" => "DESC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N"
                )
            );?>
        </div>
    </div>
</section>