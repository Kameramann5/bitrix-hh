<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */

//region Ресайз картинок
foreach($arResult["ITEMS"] as $key => $arItem) {
	if(!empty($arItem["PREVIEW_PICTURE"])) {
		$pic = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], ["width" => 900, "height" => 900]);
		$arResult["ITEMS"][$key]["PREVIEW_PICTURE"]["SRC"] = $pic["src"];
	}
}
//endregion