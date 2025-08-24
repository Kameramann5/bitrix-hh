<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @global CMain $APPLICATION */
?>
</main>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg in" id="table-reservation" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-table-reservation-inner">
        <div class="modal-content modal-table-reservation">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ЗАКРЫТЬ">
                <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27.6988 15.5533C27.8672 15.3847 28.0006 15.1848 28.0914 14.9649C28.1822 14.745 28.2286 14.5094 28.2279 14.2717C28.2273 14.0339 28.1796 13.7986 28.0876 13.5792C27.9956 13.3598 27.8611 13.1606 27.6918 12.9929C27.5225 12.8253 27.3217 12.6925 27.1008 12.6021C26.88 12.5117 26.6434 12.4655 26.4046 12.4661C26.1658 12.4668 25.9295 12.5143 25.7091 12.6058C25.4888 12.6974 25.2887 12.8313 25.1203 12.9999L19.9911 18.1345L14.8339 13.0259C14.4895 12.7002 14.0306 12.5216 13.5556 12.5284C13.0806 12.5353 12.6271 12.7269 12.2922 13.0624C11.9574 13.3979 11.7676 13.8505 11.7637 14.3235C11.7598 14.7965 11.9419 15.2522 12.2712 15.5932L17.4283 20.7L12.2973 25.8347C12.1227 26.0018 11.9834 26.202 11.8876 26.4235C11.7918 26.6451 11.7414 26.8834 11.7394 27.1246C11.7374 27.3658 11.7838 27.6049 11.8759 27.828C11.968 28.051 12.104 28.2535 12.2758 28.4235C12.4476 28.5936 12.6518 28.7277 12.8764 28.818C13.101 28.9084 13.3415 28.9531 13.5837 28.9497C13.8259 28.9462 14.065 28.8945 14.2869 28.7978C14.5088 28.701 14.709 28.5611 14.8758 28.3862L20.005 23.2534L25.1622 28.3602C25.3291 28.5374 25.5303 28.6793 25.7535 28.7775C25.9768 28.8757 26.2176 28.9281 26.4616 28.9317C26.7057 28.9352 26.9479 28.8898 27.1739 28.7982C27.4 28.7065 27.6052 28.5705 27.7773 28.3982C27.9494 28.2259 28.0849 28.0209 28.1757 27.7954C28.2666 27.5698 28.3109 27.3284 28.306 27.0854C28.3011 26.8425 28.2472 26.603 28.1473 26.3813C28.0475 26.1595 27.9039 25.9601 27.725 25.7948L22.5697 20.6879L27.6988 15.5533Z" fill="black"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 20.6945C0 9.69724 8.95455 0.781738 20 0.781738C31.0455 0.781738 40 9.69724 40 20.6945C40 31.6918 31.0455 40.6073 20 40.6073C8.95455 40.6073 0 31.6918 0 20.6945ZM20 36.9868C17.8511 36.9868 15.7232 36.5654 13.7379 35.7466C11.7526 34.9279 9.94867 33.7278 8.42916 32.2149C6.90966 30.702 5.70432 28.906 4.88197 26.9293C4.05962 24.9526 3.63636 22.8341 3.63636 20.6945C3.63636 18.555 4.05962 16.4364 4.88197 14.4597C5.70432 12.4831 6.90966 10.687 8.42916 9.17414C9.94867 7.66127 11.7526 6.46119 13.7379 5.64242C15.7232 4.82366 17.8511 4.40225 20 4.40225C24.3399 4.40225 28.5021 6.11875 31.5708 9.17414C34.6396 12.2295 36.3636 16.3735 36.3636 20.6945C36.3636 25.0155 34.6396 29.1595 31.5708 32.2149C28.5021 35.2703 24.3399 36.9868 20 36.9868Z" fill="black"></path>
                </svg>
            </button>
            <img class="modal-bg" src="<?=SITE_TEMPLATE_PATH ?>/assets/img/modal.svg" alt="фон">
            <img class="modal-footer-bg" src="<?=SITE_TEMPLATE_PATH ?>/assets/img/resrvation_modal_footer.svg" alt="фон">

            <p class="modal-table-reservation-title">Бронирование</p>
            <?php
            $rsSites = CSite::GetByID(SITE_ID);
            $arSite = $rsSites->Fetch();
            $strEmail = $arSite['EMAIL'];
            ?>
            <?$APPLICATION->IncludeComponent(
                "custom:main.feedback",
                "table-reservation",
                Array(
                    "EMAIL_TO" => $strEmail,
                    "EVENT_MESSAGE_ID" => array("13"),
                    "OK_TEXT" => "Успешно отправлено!",
                    "REQUIRED_FIELDS" => array("NAME","PHONE"),
                    "USE_CAPTCHA" => "N",
                    "AJAX_MODE" => "Y",
                )
            );?>
        </div>
    </div>
</div>
<footer>
    <div class="container" >
        <div class="row" style="position: relative">
            <div class=" col-lg-5 logo">
                <?$APPLICATION->IncludeFile(SITE_DIR."include/party/footer/logo.php", [], ["NAME" => "лого", "TEMPLATE" => "file_inc.php"])?>


            </div>
            <div class="col desc">
                <div class="col desc">
                    <div class=" desc-mobile">
                        <div class="desc-inner">
                            <div class="footer-p">
                                <?$APPLICATION->IncludeFile(SITE_DIR."include/main/work_time_text.php", [], ["NAME" => "надпись над временем работы", "TEMPLATE" => "file_inc.php"])?>
                            </div>
                            <div class="footer-p-two">
                                <?$APPLICATION->IncludeFile(SITE_DIR."include/main/time_work.php", [], ["NAME" => "время работы", "TEMPLATE" => "file_inc.php"])?>
                            </div>
                        </div>
                        <div class="desc-inner footer-block-bronirovanie" >
                            <div class="footer-p">
                                <?$APPLICATION->IncludeFile(SITE_DIR."include/main/tel_text.php", [], ["NAME" => "надпись над телефоном", "TEMPLATE" => "file_inc.php"])?>
                            </div>
                            <div class="footer-p-two">
                                <?$APPLICATION->IncludeFile(SITE_DIR."include/main/tel.php", [], ["NAME" => "телефон", "TEMPLATE" => "file_inc.php"])?>
                            </div>
                        </div>
                    </div>
                    <div class="desc-inner footer-block-address">
                        <div class="footer-p-two-right">
                            <?$APPLICATION->IncludeFile(SITE_DIR."include/main/address.php", [], ["NAME" => "адрес", "TEMPLATE" => "file_inc.php"])?>

                            <div class="social">
                                <div class="social-inner">

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
                                            "PROPERTY_CODE" => array("NETWORK_URL", "NETWORK_IMG"),
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

                        </div>
                    </div>
                    <div class="mob-footer-politika">
                        <div class="social-inner-p">
                            <?$APPLICATION->IncludeFile(SITE_DIR."include/main/footer/copyright.php", [], ["NAME" => "копирайт", "TEMPLATE" => "file_inc.php"])?>
                        </div>
                        <?$APPLICATION->IncludeFile(SITE_DIR."include/main/footer/politika.php", [], ["NAME" => "политика", "TEMPLATE" => "file_inc.php"])?>
                    </div>
                </div>

            </div>
        </div>

        <div class="footer_bottom">

            <div class="social-inner-p">
                <?$APPLICATION->IncludeFile(SITE_DIR."include/main/footer/copyright.php", [], ["NAME" => "копирайт", "TEMPLATE" => "file_inc.php"])?>
            </div>
            <div class="footer-politika">

                <?$APPLICATION->IncludeFile(SITE_DIR."include/main/politika.php", [], ["NAME" => "политика", "TEMPLATE" => "file_inc.php"])?>
            </div>
            <div class="direkt">
                <?$APPLICATION->IncludeFile(SITE_DIR."include/party/footer/dev.php", [], ["NAME" => "разработка", "TEMPLATE" => "file_inc.php"])?>
            </div>
        </div>


</footer>
</body>