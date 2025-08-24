<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */
$elementEdit = CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT");
$elementDelete = CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE");
$areaId = "news-list_".$this->randString();
?>
<?Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/assets/js/holiday.js")?>
<?if(!empty($arResult["ITEMS"])):?>
<?php
    if ($arParams['ACTIVE']=='Y') {
    ?>
		<div id="<?=$areaId?>_items"  class="row">
			<!-- items -->
			<?foreach($arResult["ITEMS"] as $key => $arItem):?>
				<?
				$this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], $elementEdit);
				$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], $elementDelete);
				?>
				<div id="<?=$this->GetEditAreaId($arItem["ID"])?>"  class="col-3 block" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>')">
							<?if(!empty($arItem["PREVIEW_PICTURE"])):?>
                                <p><?php
                                    $date = $arItem["PROPERTIES"]["DATE"]["VALUE"];
                                    $date2= date("d.m.Y", strtotime($date));
                                   echo  $date2; ?> </p>
                                <p><?=$arItem["NAME"]?></p>
                                <a
                                        data-img="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                                        data-date="<?=$date2; ?>"
                                        data-time="<?=$arItem["PROPERTIES"]["TIME"]["VALUE"]; ?>"
                                        data-count="<?=$arItem["PROPERTIES"]["COUNT"]["VALUE"]; ?>"
                                        data-age="<?=$arItem["PROPERTIES"]["AGE"]["VALUE"]; ?>"
                                        data-price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"]; ?>"
                                        data-description="<?=$arItem["PREVIEW_TEXT"]?>"
                                        data-nametitle="<?=$arItem["NAME"]?>" class="click_modal"  type="button"  data-bs-toggle="modal" data-bs-target="#modal"><?=$arItem["PROPERTIES"]["BTN"]["VALUE"]; ?></a>
                            <?else:?>
							<?endif?>
				</div>
			<?endforeach?>
			<!-- items -->
		</div>

		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
			<div id="<?=$areaId?>_nav">
				<!-- nav -->
				<?=$arResult["NAV_STRING"]?>
				<!-- nav -->
			</div>
		<?endif?>


    <?php } else {  ?>

<div class="calendar-no-active">

    <img src="<?=$this->GetFolder();?>/images/left.svg" alt="фон" class="calendar-no-active-hero">
    <img src="<?=$this->GetFolder();?>/images/right.svg" alt="фон" class="calendar-no-active-hero-two">
    <div class="calendar-no-active-inner">
    <img src="<?=$arParams['IMG_ONE']?>" alt="картинка" class="calendar-no-active-logo">
    </div>

<div class="calendar-no-active-text">
    <?$APPLICATION->IncludeFile($this->GetFolder()."/inc/title.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>
</div>
</div>



    <?php  } ?>




	<?$jsParams = [
		"areaId" => $areaId,
		"navNum" => intval($arResult["NAV_RESULT"]->NavNum),
	]?>
	<script>new NewsList(<?=CUtil::PhpToJSObject($jsParams, false, false, true)?>)</script>
<?endif;