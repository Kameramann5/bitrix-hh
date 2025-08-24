<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

if($arResult["bDescPageNumbering"]) {
	return; // пока не поддерживаем
} elseif(!$arResult["NavShowAlways"]) {
	if($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false)) {
		return;
	}
}

$areaId = "invisible_preloader_".$this->randString();
$isLastPage = $arResult["NavPageNomer"] == $arResult["NavPageCount"];
$urlPaged = $arResult["sUrlPath"]."?".($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&" : "")."PAGEN_".$arResult["NavNum"]."=";
?>
<?if(!$isLastPage):?>
	<div id="<?=$areaId?>"></div>
	<?$jsParams = [
		"areaId" => $areaId,
		"navNum" => intval($arResult["NavNum"]),
		"nextPageUrl" => $urlPaged.($arResult["NavPageNomer"] + 1)
	]?>
	<script>new InvisiblePreloader(<?=CUtil::PhpToJSObject($jsParams, false, false, true)?>);</script>
<?endif?>