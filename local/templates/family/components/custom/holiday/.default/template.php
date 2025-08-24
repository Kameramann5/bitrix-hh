<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @global CUser $USER */
?>
<?Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/assets/js/script.js")?>
<section class="holiday">
    <div class="container hero-block-one">
        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/h1.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>
        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/desc.php", [], ["NAME" => "описание", "TEMPLATE" => "file_inc.php"])?>
    </div>
</section>
<section class="holiday">
    <div class="container hero-block-two">
        <div class="row">
            <div class="col block">
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/blocks/block1_svg.php", [], ["NAME" => "блок", "TEMPLATE" => "file_inc.php"])?>
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/blocks/block1_title.php", [], ["NAME" => "название", "TEMPLATE" => "file_inc.php"])?>
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/blocks/block1_url.php", [], ["NAME" => "ссылка", "TEMPLATE" => "file_inc.php"])?>
            </div>
            <div class="col block">
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/blocks/block2_svg.php", [], ["NAME" => "блок", "TEMPLATE" => "file_inc.php"])?>
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/blocks/block2_title.php", [], ["NAME" => "название", "TEMPLATE" => "file_inc.php"])?>
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/blocks/block2_url.php", [], ["NAME" => "ссылка", "TEMPLATE" => "file_inc.php"])?>
            </div>

            <div class="col block">
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/blocks/block4_svg.php", [], ["NAME" => "блок", "TEMPLATE" => "file_inc.php"])?>
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/blocks/block4_title.php", [], ["NAME" => "название", "TEMPLATE" => "file_inc.php"])?>
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/blocks/block4_url.php", [], ["NAME" => "ссылка", "TEMPLATE" => "file_inc.php"])?>
            </div>
        </div>
    </div>
</section>
<section class="holiday" >
    <div class="container hero-block-three">
        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/title.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>
        <div class="row">
            <?$APPLICATION->IncludeComponent(
                "bitrix:news",
                "holiday",
                Array(
                    "IMG_ONE" => "/upload/iblock/303/logo.svg",
                    "ACTIVE" => "",
                    "ADD_ELEMENT_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "N",
                    "BROWSER_TITLE" => "-",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "N",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "N",
                    "DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
                    "DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
                    "DETAIL_DISPLAY_TOP_PAGER" => "N",
                    "DETAIL_FIELD_CODE" => array("DATE_ACTIVE_FROM", "DATE_ACTIVE_TO", ""),
                    "DETAIL_PAGER_SHOW_ALL" => "N",
                    "DETAIL_PAGER_TEMPLATE" => "",
                    "DETAIL_PAGER_TITLE" => "",
                    "DETAIL_PROPERTY_CODE" => array("", "", ""),
                    "DETAIL_SET_CANONICAL_URL" => "Y",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "N",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FILE_404" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "6",
                    "IBLOCK_TYPE" => "party",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "LIST_FIELD_CODE" => array("", ""),
                    "LIST_PROPERTY_CODE" => array("DATE", "BTN", "PRICE", "AGE", "COUNT", "TIME", "", ""),
                    "MESSAGE_404" => "",
                    "META_DESCRIPTION" => "-",
                    "META_KEYWORDS" => "-",
                    "NEWS_COUNT" => "6",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "invisible-preloader",
                    "PAGER_TITLE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "SEF_FOLDER" => "",
                    "SEF_MODE" => "Y",
                    "SEF_URL_TEMPLATES" => Array(
                        "detail" => "",
                        "news" => "",
                        "section" => ""
                    ),
                    "SET_LAST_MODIFIED" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER1" => "DESC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N",
                    "USE_CATEGORIES" => "N",
                    "USE_FILTER" => "N",
                    "USE_PERMISSIONS" => "N",
                    "USE_RATING" => "N",
                    "USE_RSS" => "N",
                    "USE_SEARCH" => "N",
                    "USE_SHARE" => "N"
                )
            );?>
        </div>
    </div>
</section>
<section class="holiday hero-block-four hero-block-four-section">
    <div  class=" hero-block-four">

        <?$APPLICATION->IncludeComponent("bitrix:news.list", "main_slider", array(
	"LABEL_SLIDER" => "Наши мероприятия",
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
		"FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "party",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "50",
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
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
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
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>
        <div>
        </div>
    </div>
</section>

<div id="contact_form" class="custom_anchor">  </div>
<section class="holiday" >
    <div class="container hero-block-five">
        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/title_three.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>
        <div class="zakaz"    id="order_an_event">
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
	      
        </div>
    </div>
</section>
<section class="holiday">
    <div class="container hero-block-six">
        <div class="row hero-block-six-row">
        <div class="col-lg">  <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/desc_two.php", [], ["NAME" => "описание", "TEMPLATE" => "file_inc.php"])?></div>
        <div class="col-lg"><?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/desc_three.php", [], ["NAME" => "описание", "TEMPLATE" => "file_inc.php"])?></div>
        </div>

        <?$APPLICATION->IncludeFile(SITE_DIR."include/main/tel.php", [], ["NAME" => "телефон", "TEMPLATE" => "file_inc.php"])?>
    </div>
</section>