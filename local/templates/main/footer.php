<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @global CMain $APPLICATION */
?>
<?php
$page = $APPLICATION->GetCurPage();
if( $page!="/") {   ?>
    <footer>
        <div class="container">
            <div class="row" style="position: relative">
                <div class=" col-lg-5 logo">
                    <?$APPLICATION->IncludeFile(SITE_DIR."include/main/footer/logo.php", [], ["NAME" => "лого", "TEMPLATE" => "file_inc.php"])?>
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
                            <div class="desc-inner footer-block-bronirovanie">
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
        <div class="icon">
            <a href="<?$APPLICATION->IncludeFile(SITE_DIR."include/main/network_url/network.php", [], ["NAME" => "соц сеть", "TEMPLATE" => "file_inc.php"])?>">
            <?$APPLICATION->IncludeFile(SITE_DIR."include/main/footer/network.php", [], ["NAME" => "соц сеть", "TEMPLATE" => "file_inc.php"])?>
            </a>
        </div>
        <div class="icon">

            <a href="<?$APPLICATION->IncludeFile(SITE_DIR."include/main/network_url/network2.php", [], ["NAME" => "соц сеть", "TEMPLATE" => "file_inc.php"])?>">

            <?$APPLICATION->IncludeFile(SITE_DIR."include/main/footer/network2.php", [], ["NAME" => "соц сеть", "TEMPLATE" => "file_inc.php"])?>
            </a>
        </div>
        <div class="icon">
            <a href="<?$APPLICATION->IncludeFile(SITE_DIR."include/main/network_url/network3.php", [], ["NAME" => "соц сеть", "TEMPLATE" => "file_inc.php"])?>">
            <?$APPLICATION->IncludeFile(SITE_DIR."include/main/footer/network3.php", [], ["NAME" => "соц сеть", "TEMPLATE" => "file_inc.php"])?>
            </a>
        </div>
        <div class="icon">
            <a href="<?$APPLICATION->IncludeFile(SITE_DIR."include/main/network_url/network4.php", [], ["NAME" => "соц сеть", "TEMPLATE" => "file_inc.php"])?>">
            <?$APPLICATION->IncludeFile(SITE_DIR."include/main/footer/network4.php", [], ["NAME" => "соц сеть", "TEMPLATE" => "file_inc.php"])?>
            </a>
        </div>
        <div class="icon">
            <a href="<?$APPLICATION->IncludeFile(SITE_DIR."include/main/network_url/network5.php", [], ["NAME" => "соц сеть", "TEMPLATE" => "file_inc.php"])?>">
            <?$APPLICATION->IncludeFile(SITE_DIR."include/main/footer/network5.php", [], ["NAME" => "соц сеть", "TEMPLATE" => "file_inc.php"])?>
            </a>
        </div>
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
                    <?$APPLICATION->IncludeFile(SITE_DIR."include/main/footer/dev.php", [], ["NAME" => "разработка", "TEMPLATE" => "file_inc.php"])?>
                </div>
            </div>
    </footer>
<?php  } ?>
    </main>
    </body>