<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$elementEdit = CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT");
$elementDelete = CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE");
$areaId = "news-list_".$this->randString();
?>
<?if(!empty($arResult["ITEMS"])):?>
            <h1 class="main_title_h1">
                <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/h1.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>
            </h1>
<p class="main_title_desc">
    <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."inc/desc.php", [], ["NAME" => "заголовок", "TEMPLATE" => "file_inc.php"])?>

</p>


	<div>
		<div id="<?=$areaId?>_items"  class="news-list">
			<!-- items -->
			<?foreach($arResult["ITEMS"] as $key => $arItem):?>
				<?
				$this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], $elementEdit);
				$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], $elementDelete);
				?>
				<div id="<?=$this->GetEditAreaId($arItem["ID"])?>"  class="news-list__item hover-img">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<div class="news-list__item-img">
							<?if(!empty($arItem["PREVIEW_PICTURE"])):?>
								<img
									src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
									alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
								>
                                <div class="news-list__item-title hover-title_color"><?=$arItem["NAME"]?></div>

                            <?else:?>
								<?//TODO: заглушка?>
							<?endif?>

						</div>
						<div class="news-list__item-info">



							<?if($arItem["PREVIEW_TEXT"] !== ""):?>
								<div class="news-list__item-text"><?=$arItem["PREVIEW_TEXT"]?></div>
							<?endif?>
						</div>
					</a>
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
	</div>
	<?$jsParams = [
		"areaId" => $areaId,
		"navNum" => intval($arResult["NAV_RESULT"]->NavNum),
	]?>
	<script>new NewsList(<?=CUtil::PhpToJSObject($jsParams, false, false, true)?>)</script>
<?endif;