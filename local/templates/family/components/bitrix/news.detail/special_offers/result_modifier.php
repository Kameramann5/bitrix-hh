<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */

//region Ресайз картинки
if(!empty($arResult["DETAIL_PICTURE"])) {
	$pic = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], ["width" => 930, "height" => 930]);
	$arResult["DETAIL_PICTURE"]["SRC"] = $pic["src"];
}
//endregion

//region Картинки галереи
if(!empty($arResult["PROPERTIES"]["GALLERY"]["VALUE"])) {
	if(isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"])) {
		$defaultDescription = $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"];
	} else {
		$defaultDescription = $arResult["NAME"];
	}
	
	foreach($arResult["PROPERTIES"]["GALLERY"]["VALUE"] as $key => $fileId) {
		$full = CFile::GetFileArray($fileId);
		$preview = CFile::ResizeImageGet($full, ["width" => 360, "height" => 360]);
		$arResult["PROPERTIES"]["GALLERY"]["VALUE"][$key] = [
			"FULL" => $full["SRC"],
			"PREVIEW" => $preview["src"],
			"DESCRIPTION" => $arResult["PROPERTIES"]["GALLERY"]["DESCRIPTION"][$key] ?: $defaultDescription,
		];
	}
}
//endregion