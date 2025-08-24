<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$elementEdit = CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT");
$elementDelete = CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE");
$areaId = "news-list_".$this->randString();
?>
    <div class="container hero-block-four">
        <h2><?=$arParams['LABEL_SLIDER']?></h2>
    </div>
<?if(!empty($arResult["ITEMS"])):?>
    <div class="swiper-index hero-block-four"  style="position: relative">
        <div class="swiper-wrapper">
            <!-- items -->
            <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                <?
                $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], $elementEdit);
                $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], $elementDelete);
                ?>
                <div id="<?=$this->GetEditAreaId($arItem["ID"])?>"  class="swiper-slide">
                            <?if(!empty($arItem["PREVIEW_PICTURE"])):?>
                                <a class="swiper-slide" href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" data-fancybox="slider-gallery">
                                <img
                                        src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                                        alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                >
                                </a>
                            <?else:?>
                            <?endif?>
                </div>
            <?endforeach?>
            <!-- items -->
    </div>
    <div class="swiper-button-prev index--swiper-button-prev">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6173 2.3299L23.3472 12L14.6173 21.6701L13.1327 20.3299L19.75 13H0V11H19.75L13.1327 3.6701L14.6173 2.3299Z" fill="#fff"/>
        </svg>
    </div>
    <div class="swiper-button-next index--swiper-button-next">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6173 2.3299L23.3472 12L14.6173 21.6701L13.1327 20.3299L19.75 13H0V11H19.75L13.1327 3.6701L14.6173 2.3299Z" fill="#fff"/>
        </svg>
    </div>
    </div>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
            <div id="<?=$areaId?>_nav">
                <!-- nav -->
                <?=$arResult["NAV_STRING"]?>
                <!-- nav -->
            </div>
        <?endif?>
    <?$jsParams = [
        "areaId" => $areaId,
        "navNum" => intval($arResult["NAV_RESULT"]->NavNum),
    ]?>
    <script>new NewsList(<?=CUtil::PhpToJSObject($jsParams, false, false, true)?>)</script>
<?endif;