<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @global CUser $USER */
?>
<section class="menu">
    <div class="container hero-block-one">
        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/h1.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>
    </div>
</section>

<section class="menu">
    <div class="container hero-block-three">
        <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/title.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>
        <div class="row">
            <?$APPLICATION->IncludeComponent(
                "bitrix:news",
                "menu",
                Array(
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
                    "IBLOCK_ID" => "9",
                    "IBLOCK_TYPE" => "party",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "LIST_FIELD_CODE" => array("", ""),
                    "LIST_PROPERTY_CODE" => array("FILE", "", "", "", "", "", "", ""),
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