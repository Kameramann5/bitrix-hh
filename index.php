<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Главная страница");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetPageProperty("hide_h1", "y");
$APPLICATION->SetPageProperty("custom_markup", "y");
$APPLICATION->SetTitle("Барто");

?>

<div class="main_block">
    <?$APPLICATION->IncludeFile(SITE_DIR."include/main/logo.php", [], ["NAME" => "лого", "TEMPLATE" => "file_inc.php"])?>
    <?$APPLICATION->IncludeFile(SITE_DIR."include/main/logo2.php", [], ["NAME" => "лого 2", "TEMPLATE" => "file_inc.php"])?>

    <div class="main_block_left">
    <div class="main_block_left_inner">
    <a href="/family/">
    <div class="main_block_left_p">    <?$APPLICATION->IncludeFile(SITE_DIR."include/main/left_text.php", [], ["NAME" => "текст слева", "TEMPLATE" => "file_inc.php"])?></div>
    </a>
    <div class="main_block_left_p_two">  <?$APPLICATION->IncludeFile(SITE_DIR."include/main/left_text2.php", [], ["NAME" => "текст слева", "TEMPLATE" => "file_inc.php"])?>
        </div>
    </div>
    </div>
    <div class="main_block_right">
        <div class="main_block_right_inner">
        <a href="/kids/">
        <div  class="main_block_right_p">   <?$APPLICATION->IncludeFile(SITE_DIR."include/main/right_text.php", [], ["NAME" => "текст справа", "TEMPLATE" => "file_inc.php"])?>
             </div>
        </a>
        <div class="main_block_right_p_two"> <?$APPLICATION->IncludeFile(SITE_DIR."include/main/right_text2.php", [], ["NAME" => "текст справа", "TEMPLATE" => "file_inc.php"])?>
            </div>
        </div>   </div>
    <div class="social">
	    
	    
	    <?$APPLICATION->IncludeComponent(
		    "bitrix:news.list",
		    "network",
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
			    "FIELD_CODE" => array("NAME", ""),
			    "FILTER_NAME" => "",
			    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
			    "IBLOCK_ID" => "17",
			    "IBLOCK_TYPE" => "main",
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
			    "PROPERTY_CODE" => array("NETWORK_URL", "NETWORK_IMG","NETWORK_COLOR",""),
			    "SET_BROWSER_TITLE" => "N",
			    "SET_LAST_MODIFIED" => "N",
			    "SET_META_DESCRIPTION" => "N",
			    "SET_META_KEYWORDS" => "N",
			    "SET_STATUS_404" => "N",
			    "SET_TITLE" => "N",
			    "SHOW_404" => "N",
			    "SORT_BY1" => "SORT",
			    "SORT_BY2" => "SORT",
			    "SORT_ORDER1" => "DESC",
			    "SORT_ORDER2" => "ASC",
			    "STRICT_SECTION_CHECK" => "N"
		    )
	    );?>
	    
     
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>