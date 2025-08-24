<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
   /** @global CMain $APPLICATION */
   use Bitrix\Main\Page\Asset;
   $asset = Asset::getInstance();
   $asset->addCss(SITE_TEMPLATE_PATH."/style.css");
   $asset->addCss(MAIN_TEMPLATE_PATH."template_style.css");
   $asset->addCss(MAIN_TEMPLATE_PATH."/assets/css/bootstrap-grid.min.css");
   $asset->addCss(MAIN_TEMPLATE_PATH."/assets/css/swiper.css");
   $asset->addCss(MAIN_TEMPLATE_PATH."/assets/css/bootstrap.css");
   $asset->addCss(MAIN_TEMPLATE_PATH."assets/css/jquery.fancybox.min.css");
   $asset->addJs(MAIN_TEMPLATE_PATH."assets/js/swiper.js");
   $asset->addJs(MAIN_TEMPLATE_PATH."assets/js/bootstrap.bundle.min.js");
   $asset->addJs(MAIN_TEMPLATE_PATH."assets/js/select.js");
   $asset->addJs(MAIN_TEMPLATE_PATH."assets/js/header.js");
   $asset->addJs(MAIN_TEMPLATE_PATH."assets/js/jquery.fancybox.min.js");
   CJSCore::Init();
   CJSCore::Init(["jquery3"]);
   \Bitrix\Main\UI\Extension::load([
       "custom.fonts.Mulish"
   ])
   ?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
   <head>
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="format-detection" content="telephone=no">
      <title><?$APPLICATION->ShowTitle()?></title>
      <?$APPLICATION->ShowHead()?>
   </head>
   <body>
      <?$APPLICATION->ShowPanel()?>
      <header class="header__top-content">
         <div class="container">
         <div class="header__top-content">
            <div class="header_info">
               <?$APPLICATION->IncludeFile(SITE_DIR."include/main/address.php", [], ["NAME" => "адрес", "TEMPLATE" => "file_inc.php"])?>
            </div>
            <div class="header_info header_info_two">
               <?$APPLICATION->IncludeFile(SITE_DIR."include/main/time_work.php", [], ["NAME" => "время работы", "TEMPLATE" => "file_inc.php"])?>
            </div>
            <div class="header_tel">
               <?$APPLICATION->IncludeFile(SITE_DIR."include/main/tel.php", [], ["NAME" => "телефон", "TEMPLATE" => "file_inc.php"])?>
            </div>

            <div class="header_btn">
               <a  data-bs-toggle="modal" data-bs-target="#table-reservation" type="button">
               <?$APPLICATION->IncludeFile(SITE_DIR."include/party/header/btn2.php", [], ["NAME" => "название кнопки", "TEMPLATE" => "file_inc.php"])?> </a>
            </div>
         </div>
      </header>
      <header class="header__bottom-content">
         <div class="container header__bottom-content-inner header_logo">
            <?$APPLICATION->IncludeFile(SITE_DIR."include/party/header/logo.php", [], ["NAME" => "лого", "TEMPLATE" => "file_inc.php"])?>
            <?$APPLICATION->IncludeComponent(
               "bitrix:menu",
               "adults",
               Array(
                   "ALLOW_MULTI_SELECT" => "N",
                   "CHILD_MENU_TYPE" => "left",
                   "DELAY" => "N",
                   "MAX_LEVEL" => "1",
                   "MENU_CACHE_GET_VARS" => array(""),
                   "MENU_CACHE_TIME" => "3600",
                   "MENU_CACHE_TYPE" => "N",
                   "MENU_CACHE_USE_GROUPS" => "N",
                   "ROOT_MENU_TYPE" => "top",
                   "USE_EXT" => "N"
               )
               );?>
         </div>
      </header>
      <input type="checkbox" id="hmt" class="hidden-menu-ticker">
       <?php $current_link  = $APPLICATION->GetCurPage();
$pattern = '/family/';
$current_pattern= preg_replace($pattern, 'kids', $current_link);   ?>
   <a href="<?=$current_pattern;?>">
        <div class="header_section_switch">
      <p >Kids</p>
</div>
 </a>
      <ul class="hidden-menu">
         <div>
            <?$APPLICATION->IncludeComponent(
               "bitrix:menu",
               "mob-adults",
               Array(
                   "ALLOW_MULTI_SELECT" => "N",
                   "CHILD_MENU_TYPE" => "left",
                   "DELAY" => "N",
                   "MAX_LEVEL" => "1",
                   "MENU_CACHE_GET_VARS" => array(""),
                   "MENU_CACHE_TIME" => "3600",
                   "MENU_CACHE_TYPE" => "N",
                   "MENU_CACHE_USE_GROUPS" => "N",
                   "ROOT_MENU_TYPE" => "top",
                   "USE_EXT" => "N"
               )
               );?>
            <div class="mob-social-menu">
            
                 <?$APPLICATION->IncludeComponent(
                                        "bitrix:news.list",
                                        "network_mob_menu",
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
                                            "IBLOCK_ID" => "16",
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
                                            "PROPERTY_CODE" => array("NETWORK_URL", "NETWORK_IMG","NETWORK_IMG_MOB"),
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
            <div class="mob-time-menu">
               <div  class="mob-time-menu-one">
                  <div class="mob-time-menu-one-text">
                     <?$APPLICATION->IncludeFile(SITE_DIR."include/main/work_time_text.php", [], ["NAME" => "надпись над временем работы", "TEMPLATE" => "file_inc.php"])?>
                  </div>
                  <div class="mob-time-menu-one-time">
                     <?$APPLICATION->IncludeFile(SITE_DIR."include/main/time_work.php", [], ["NAME" => "время работы", "TEMPLATE" => "file_inc.php"])?>
                  </div>
               </div>
               <div class="mob-time-menu-two">
                  <div class="mob-time-menu-bron">
                     <?$APPLICATION->IncludeFile(SITE_DIR."include/main/tel_text.php", [], ["NAME" => "надпись над телефоном", "TEMPLATE" => "file_inc.php"])?>
                  </div>
                  <div class="mob-time-menu-two-tel">
                     <?$APPLICATION->IncludeFile(SITE_DIR."include/main/tel.php", [], ["NAME" => "телефон", "TEMPLATE" => "file_inc.php"])?>
                  </div>
               </div>
               <div class="mob-time-menu-three">
                  <?$APPLICATION->IncludeFile(SITE_DIR."include/main/address.php", [], ["NAME" => "адрес", "TEMPLATE" => "file_inc.php"])?>
               </div>
            </div>
            <div class="mob-logo-menu">
               <?$APPLICATION->IncludeFile(SITE_DIR."include/party/header/logo.php", [], ["NAME" => "лого", "TEMPLATE" => "file_inc.php"])?>
            </div>
            <label class="btn-menu-close" for="hmt">
               <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_364_12137)">
                     <rect x="1.14258" y="32.2548" width="44" height="4" rx="2" transform="rotate(-45 1.14258 32.2548)" fill="#FBB506"/>
                     <rect x="32.2549" y="35.0832" width="44" height="4" rx="2" transform="rotate(-135 32.2549 35.0832)" fill="#FBB506"/>
                  </g>
                  <defs>
                     <clipPath id="clip0_364_12137">
                        <rect width="36" height="36" fill="white"/>
                     </clipPath>
                  </defs>
               </svg>
            </label>
         </div>
      </ul>
      <main>
      <?php
         $page = $APPLICATION->GetCurPage();
         if( $page!="/family/") {   ?>
      <div class="container">
         <?$APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "breadcrumb",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0"
            )
            );?>
      </div>
      <?php  } ?>