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

?>
<div class="mfeedback">
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
        <div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div>
        <?
    }
    ?>
    <form action="<?=POST_FORM_ACTION_URI?>" method="POST" >
        <?=bitrix_sessid_post()?>
        <div class="mf-flex">
            <div class="mf-name">
	            <input class="" type="hidden" name="user_url" value="<?="http://".SITE_SERVER_NAME.$APPLICATION->GetCurUri(); ?>" id="" />
                <input required minlength="3" maxlength="100"   type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" placeholder="<?=GetMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?>*<?endif?>">
            </div>
            <div class="mf-message">
                <input required  minlength="5"   maxlength="100"   type="text" name="user_phone" value="<?=$arResult["AUTHOR_PHONE"]?>" placeholder="<?=GetMessage("MFT_PHONE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])):?>*<?endif?>">
            </div>
        </div>
        <ul class="select">
            <li>
                <input class="select_close" type="radio" name="user_select" value="" id="awesomeness-close" />
                <span class="select_label select_label-placeholder">выберите</span>
            </li>
            <li class="select_items">
                <input class="select_expand" type="radio" name="user_select" id="awesomeness-opener"/>
                <label class="select_closeLabel" for="awesomeness-close"></label>
                <ul class="select_options">
                    <?php
                    CModule::IncludeModule('iblock');
                    $arFilter = array(
                        'IBLOCK_ID' => 6, // выборка элементов из инфоблока с ИД равным «5»
                        'ACTIVE' => 'Y',  // выборка только активных элементов
                    );
                    $res = CIBlockElement::GetList(array(), $arFilter, false, false, array('NAME','ID'));
                    while ($element = $res->GetNext()) {
                        $section = CIBlockSection::GetByID($element['IBLOCK_SECTION_ID']);
                        $ar_res = $section->GetNext();
                        echo ' <li class="select_option">';
                        echo '  <input class="select_input" type="radio" name="user_select" id="awesomeness-'.$element['ID'].'" value="'.$element['NAME'].'"/>';
                        echo ' <label class="select_label" for="awesomeness-'.$element['ID'].'">'.$element['NAME'].'</label>';
                        echo '  </li>';

                    }
                    ?>
                </ul>
                <label class="select_expandLabel" for="awesomeness-opener"></label>
            </li>
        </ul>
        <?php $APPLICATION->IncludeComponent(
            "bitrix:main.userconsent.request",
            "news.detail",
            Array(
                "AUTO_SAVE" => "Y",
                "ID" => "1",
                "IS_CHECKED" => "N",
                "IS_LOADED" => "Y"
            )
        );
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
            <input type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
        </div>
    </form>
</div>