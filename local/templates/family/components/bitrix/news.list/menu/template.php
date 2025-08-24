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
		<div id="<?=$areaId?>_items"  class="row">
			<!-- items -->
			<?foreach($arResult["ITEMS"] as $key => $arItem):?>
				<?
				$this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], $elementEdit);
				$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], $elementDelete);
				?>
            <div class="block-main">
                <a <?php  if($arItem["PROPERTIES"]["FILE"]["VALUE"])  {   ?> href="<?=CFile::GetPath($arItem["PROPERTIES"]["FILE"]["VALUE"])?>"      <?php   }  ?>
                        target="_blank"    >
				<div id="<?=$this->GetEditAreaId($arItem["ID"])?>"  class="col-3 block" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>')">
							<?if(!empty($arItem["PREVIEW_PICTURE"])):?>
                            <?else:?>
							<?endif?>
				</div></a>

                <a   <?php  if($arItem["PROPERTIES"]["FILE"]["VALUE"])  {   ?> href="<?=CFile::GetPath($arItem["PROPERTIES"]["FILE"]["VALUE"])?>"      <?php   }  ?>
                         target="_blank" class="url"   ><?=$arItem["NAME"]; ?></a>     </div>
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