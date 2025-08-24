<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$elementEdit = CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT");
$elementDelete = CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE");
$areaId = "news-list_".$this->randString();
?>
<?if(!empty($arResult["ITEMS"])):?>






		<div id="<?=$areaId?>_items"  >
			<!-- items -->
			<?foreach($arResult["ITEMS"] as $key => $arItem):?>
				<?
				$this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], $elementEdit);
				$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], $elementDelete);
				?>
				<div id="<?=$this->GetEditAreaId($arItem["ID"])?>"  class="row">
<?php
if($arItem["PROPERTIES"]["PLACE"]["VALUE_XML_ID"]=="LEFT")  {
?>
                            <div class="col-md-8 block first-block">
                                <?php  $arProps = $arItem['PROPERTIES'];
                                if($arProps['BIG_IMG']['VALUE']) { ?>
                                    <a  data-fancybox="gallery" data-caption="" href=" <?=CFile::GetPath($arItem["PROPERTIES"]["BIG_IMG"]["VALUE"]);  ?>  ">
                                    <img class="" src="<?=CFile::GetPath($arItem["PROPERTIES"]["BIG_IMG"]["VALUE"]);  ?>"> </a>
                                <?php }    ?>
                            </div>
                            <div class="col-md block last-block">
                                <?php  if($arProps['SMALL_IMG']['VALUE']) { ?>
                                    <a  data-fancybox="gallery" data-caption="" href="<?=CFile::GetPath($arItem["PROPERTIES"]["SMALL_IMG"]["VALUE"]);  ?>">
                                    <img class="" src="<?=CFile::GetPath($arItem["PROPERTIES"]["SMALL_IMG"]["VALUE"]);  ?>"></a>
                                <?php }    ?>
                                <?php  if($arProps['SMALL_IMG_TWO']['VALUE']) { ?>
                                <a  data-fancybox="gallery" data-caption="" href="<?=CFile::GetPath($arItem["PROPERTIES"]["SMALL_IMG_TWO"]["VALUE"]);  ?>">
                                    <img class="" src="<?=CFile::GetPath($arItem["PROPERTIES"]["SMALL_IMG_TWO"]["VALUE"]);  ?>"></a>
                                <?php }    ?>
                            </div>
                    <?php } ?>
                    <?php
                    if($arItem["PROPERTIES"]["PLACE"]["VALUE_XML_ID"]=="RIGHT")  {
                        ?>
                        <div class="col-md block last-block">
                            <?php  if($arProps['SMALL_IMG']['VALUE']) { ?>
                                <a  data-fancybox="gallery" data-caption="" href="<?=CFile::GetPath($arItem["PROPERTIES"]["SMALL_IMG"]["VALUE"]);  ?>">
                                    <img class="" src="<?=CFile::GetPath($arItem["PROPERTIES"]["SMALL_IMG"]["VALUE"]);  ?>"></a>
                            <?php }    ?>
                            <?php  if($arProps['SMALL_IMG_TWO']['VALUE']) { ?>
                                <a  data-fancybox="gallery" data-caption="" href="<?=CFile::GetPath($arItem["PROPERTIES"]["SMALL_IMG_TWO"]["VALUE"]);  ?>">
                                    <img class="" src="<?=CFile::GetPath($arItem["PROPERTIES"]["SMALL_IMG_TWO"]["VALUE"]);  ?>"></a>                            <?php }    ?>
                        </div>
                        <div class="col-md-8 block first-block">
                            <?php  $arProps = $arItem['PROPERTIES'];
                            if($arProps['BIG_IMG']['VALUE']) { ?>
                                <a  data-fancybox="gallery" data-caption="" href=" <?=CFile::GetPath($arItem["PROPERTIES"]["BIG_IMG"]["VALUE"]);  ?>  ">
                                    <img class="" src="<?=CFile::GetPath($arItem["PROPERTIES"]["BIG_IMG"]["VALUE"]);  ?>"> </a>
                            <?php }    ?>

                        </div>
                    <?php } ?>
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
	<?$jsParams = [
		"areaId" => $areaId,
		"navNum" => intval($arResult["NAV_RESULT"]->NavNum),
	]?>
	<script>new NewsList(<?=CUtil::PhpToJSObject($jsParams, false, false, true)?>)</script>
<?endif;