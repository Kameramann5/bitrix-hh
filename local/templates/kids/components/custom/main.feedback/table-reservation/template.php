<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
$areaId = "Script_".$this->randString();
?>
<div class="table-reservation">
    <?php if(!empty($arResult["ERROR_MESSAGE"]))
    {
        echo "<div class='error_inner'>";
        foreach($arResult["ERROR_MESSAGE"] as $v)
            ShowError($v);
        echo "</div>";
    }
    if($arResult["OK_MESSAGE"] <> '')
    {
        ?>
        <style>
            #stage_one { display: none}
            #stage_two { display: none}
            .modal-table-reservation .modal-table-reservation-title { display: none}
            .mf-ok-text  { display: none}
        </style>
        <div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div>
        <div class="reserved-done">
            <img src="<?=SITE_TEMPLATE_PATH ?>/assets/img/reserved.svg" alt="забронировано">
            <p class="reserved-done-text"> Ваш столик успешно забронирован! Спасибо, что выбираете нас! </p>
            <p class="reserved-done-btn" data-bs-dismiss="modal" aria-label="ЗАКРЫТЬ">ЗАКРЫТЬ</p>
        </div>
        <?
    }
    ?>
    <div class="" id="<?=$areaId?>">
        <form action="<?=POST_FORM_ACTION_URI?>" method="POST">
            <?=bitrix_sessid_post()?>
            <div id="stage_one">
                <input class="" type="hidden" name="user_url" value="<?="http://".SITE_SERVER_NAME.$APPLICATION->GetCurUri(); ?>" id="" />
                <label class="label-block">Выберите дату:* <div  id="selectdatelabel" style="color: red">Обязательно выберите дату!</div></label>
                <input required  minlength="5"  id="datetimepicker"  maxlength="100"   type="date" name="user_date" value="<?=$arResult["AUTHOR_DATE"]?>" placeholder="<?=GetMessage("MFT_DATE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("DATE", $arParams["REQUIRED_FIELDS"])):?>*<?endif?>">
                <label class="label-block">Количество гостей:</label>
                <div class="quantity_inner">
                    <button class="bt_minus">-</button>
                    <input required   class="quantity" value="1" data-max-count="100"   type="text" name="user_count" value="<?=$arResult["AUTHOR_COUNT"]?>" placeholder="<?=GetMessage("MFT_COUNT")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("COUNT", $arParams["REQUIRED_FIELDS"])):?>*<?endif?>">
                    <button class="bt_plus">+</button>
                </div>
                <label class="label-block" >Выберите время:* <div  id="selecttimelabel" style="color: red">Обязательно выберите время!</div></label>
                <div class="form_radio_group">
                    <div class="form_radio_group-item">
                        <input id="radio-1" type="radio" name="user_time" value="11:00">
                        <label for="radio-1">11:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-2" type="radio" name="user_time" value="11:30">
                        <label for="radio-2">11:30</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-3" type="radio" name="user_time" value="12:00">
                        <label for="radio-3">12:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-4" type="radio" name="user_time" value="12:30">
                        <label for="radio-4">12:30</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-5" type="radio" name="user_time" value="13:00">
                        <label for="radio-5">13:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-6" type="radio" name="user_time" value="13:30">
                        <label for="radio-6">13:30</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-7" type="radio" name="user_time" value="14:00">
                        <label for="radio-7">14:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-8" type="radio" name="user_time" value="14:30">
                        <label for="radio-8">14:30</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-9" type="radio" name="user_time" value="15:00">
                        <label for="radio-9">15:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-10" type="radio" name="user_time" value="15:30">
                        <label for="radio-10">15:30</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-11" type="radio" name="user_time" value="16:00">
                        <label for="radio-11">16:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-12" type="radio" name="user_time" value="16:30">
                        <label for="radio-12">16:30</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-13" type="radio" name="user_time" value="17:00">
                        <label for="radio-13">17:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-14" type="radio" name="user_time" value="17:30">
                        <label for="radio-14">17:30</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-15" type="radio" name="user_time" value="18:00">
                        <label for="radio-15">18:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-16" type="radio" name="user_time" value="18:30">
                        <label for="radio-16">18:30</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-17" type="radio" name="user_time" value="19:00">
                        <label for="radio-17">19:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-18" type="radio" name="user_time" value="19:30">
                        <label for="radio-18">19:30</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-19" type="radio" name="user_time" value="20:00">
                        <label for="radio-19">20:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-20" type="radio" name="user_time" value="20:30">
                        <label for="radio-20">20:30</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-21" type="radio" name="user_time" value="21:00">
                        <label for="radio-21">21:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-22" type="radio" name="user_time" value="21:30">
                        <label for="radio-22">21:30</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-23" type="radio" name="user_time" value="22:00">
                        <label for="radio-23">22:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-24" type="radio" name="user_time" value="22:30">
                        <label for="radio-24">22:30</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-25" type="radio" name="user_time" value="23:00">
                        <label for="radio-25">23:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-26" type="radio" name="user_time" value="23:30">
                        <label for="radio-26">23:30</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-27" type="radio" name="user_time" value="00:00">
                        <label for="radio-27">00:00</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-28" type="radio" name="user_time" value="00:30" >
                        <label for="radio-28">00:30</label>
                    </div>
                    <!-- <div class="form_radio_group-item">
                       <input id="radio-4" type="radio" name="radio" value="4" disabled>
                       <label for="radio-4">Disabled</label>
                       </div>-->
                </div>
                <div class="checkbox_child">
                    <input type="checkbox" name="user_child" value="Да" >
                    <p> Я приду с детьми</p>
                </div>
                <div class="stage-next" >
                    <p  id="stage-next">ДАЛЕЕ</p>
                </div>
            </div>
            <div id="stage_two" class="stage_two">
                <label class="label-block">Ваши данные:</label>
                <div class="mf-name">
                    <input required minlength="3" maxlength="100"   type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" placeholder="<?=GetMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?>*<?endif?>">
                </div>
                <div class="mf-message">
                    <input required  minlength="5"   maxlength="100"   type="text" name="user_phone" value="<?=$arResult["AUTHOR_PHONE"]?>" placeholder="<?=GetMessage("MFT_PHONE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])):?>*<?endif?>">
                </div>
                <div class="mf-message">
                    <input   minlength="5"   maxlength="100"   type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" placeholder="<?=GetMessage("MFT_EMAIL")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?>*<?endif?> (необязательно)">
                </div>
                <p class="userconsent">    Нажимая кнопку “Забронировать” вы соглашаетесь с нашей
                    <a href="#" target="_blank">  политикой конфиденциальности</a>
                </p>
                <?php /*$APPLICATION->IncludeComponent(
               "bitrix:main.userconsent.request",
               "news.detail",
               Array(
                   "AUTO_SAVE" => "Y",
                   "ID" => "1",
                   "IS_CHECKED" => "N",
                   "IS_LOADED" => "Y"
               )
               );*/
                ?>
                <?if($arParams["USE_CAPTCHA"] == "Y"):?>
                    <div class="mf-captcha">
                        <div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
                        <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
                        <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
                        <div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
                        <input type="text" name="captcha_word" size="30" maxlength="50" value="">
                    </div>
                <?endif;?>
                <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                <div class="submit">
                </div>
                <div class="stage-two-flex">
                    <div class="stage-two-prev" >
                        <p id="stage-two-prev">НАЗАД</p>
                    </div>
                    <div class="stage-two-next" >
                        <input type="submit" name="submit" value="ДАЛЕЕ">
                    </div>
                </div>
            </div>
            <div class="reservation-modal-footer">
                <img class="reservation-modal-footer-logo" src="<?=SITE_TEMPLATE_PATH ?>/assets/img/reservation_modal_footer_logo.svg" alt="фон">
                <div class="reservation-modal-footer-text">
                    <?$APPLICATION->IncludeFile(SITE_DIR."include/main/tel.php", [], ["NAME" => "телефон", "TEMPLATE" => "file_inc.php"])?>
                    <br>
                    <?$APPLICATION->IncludeFile(SITE_DIR."include/main/address.php", [], ["NAME" => "адрес", "TEMPLATE" => "file_inc.php"])?>
                </div>
            </div>
        </form>
    </div>
</div>
<?$jsParams = [
    "areaId" => $areaId,
]?>
<script>new ReservationTable(<?=CUtil::PhpToJSObject($jsParams, false, false, true)?>)</script>