<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

$request = \Bitrix\Main\Context::getCurrent()->getRequest();
if($request->isAjaxRequest() && $request->get("action") === "ajaxLoad") {
	$content = ob_get_clean();
	
	$APPLICATION->RestartBuffer();
	
	[, $items] = explode("<!-- items -->", $content);
	[, $nav] = explode("<!-- nav -->", $content);
	
	echo \Bitrix\Main\Web\Json::encode([
		"items" => $items,
		"nav" => $nav,
	]);
	
	\CMain::FinalActions();
}