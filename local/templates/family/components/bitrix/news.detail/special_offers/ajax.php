<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<? 

//Проверка на капчу
if(!empty($_REQUEST['g-recaptcha-response'])) 
{
    $recaptcha = $_REQUEST['g-recaptcha-response'];
    $secret = '6LeR6EwhAAAAAPW_NR-rPoDzDfdIf6QMwj0kHqca';
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret ."&response=".$recaptcha."&remoteip=".$_SERVER['REMOTE_ADDR'];

	$curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
    $curlData = curl_exec($curl);
    curl_close($curl); 
    $curlData = json_decode($curlData, true);    
    
    if(!$curlData['success']) 
    {
		$resSend["err"] .= "Не пройдена проверка «Я не робот»<br>";
		$errorRequired = true;	
    } 
}
else
{
	$resSend["err"] .= "Не пройдена проверка «Я не робот»<br>";
	$errorRequired = true;	
}	

//Проверка обязательных полей
if (empty($_REQUEST["NAME"]))
{
	$resSend["err"] .= "Не заполнено обязательное поле «Имя»<br>";
	$errorRequired = true;
}			
if (empty($_REQUEST["PHONE"]))
{
	$resSend["err"] .= "Не заполнено обязательное поле «Телефон»<br>";
	$errorRequired = true;
}			

if (!$errorRequired)
{
	Bitrix\Main\Loader::includeModule("iblock");
	
	$res = CIBlock::GetList(array(), array("CODE"=>"birthday-form"));
	if ($arRes = $res->Fetch())	{
	    $iblockId = $arRes['ID'];
	}

	$arProps = array(
		"NAME" => $_REQUEST["NAME"],
		"PHONE" => $_REQUEST["PHONE"],
		"GUESTS" => $_REQUEST["GUESTS"],
		"PROMOCODE" => $_REQUEST["promocode"],
	);

	if ($_REQUEST["FORMAT"] == "wine")	{
		$enumCode = "wine";
		$formatName = $_REQUEST["WINE_TEXT"];
	}
	else {
		$enumCode = "nowine";
		$formatName = $_REQUEST["NOWINE_TEXT"];
	}

	$props = CIBlockPropertyEnum::GetList(array(), array("IBLOCK_ID"=> $iblockId, "XML_ID" => $enumCode));
	if ($enumData = $props->GetNext()) {
		$arProps["FORMAT"] = $enumData["ID"];	
	}	

	$el = new CIBlockElement;
	$elementId = $el->Add([
		"IBLOCK_ID" => $iblockId,
		"NAME" => "Бронь от ".$_REQUEST["NAME"],
		"PROPERTY_VALUES" => $arProps,
	]);

	if($elementId) {
		//send to Telegram group 
		$token = "5495460916:AAHk3f-2XgjEyN0XSr5B1OabROf3XAmkm2c";
		$chat_id = "-619272438";

		$arFieldsTelegram = array(
			"Сообщение с сайта:" => "Новая бронь на День Рождения",
			"Имя:" => $_REQUEST["NAME"],
			"Телефон:" => $_REQUEST["PHONE"],
			"Гостей:" => $_REQUEST["GUESTS"],
			"Суммарная стоимость:" => $_REQUEST["SUMMARY"],
            "Промокод:" => $_REQUEST["promocode"],
            //"Формат ужина:" => $formatName,
			//"Перейти к записи:" => "https://".SITE_SERVER_NAME."/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=".$iblockId."&type=forms&lang=ru&ID=".$elementId."&find_section_section=0",
		);

		foreach($arFieldsTelegram as $key => $value) {
			$txt .= "<b>".$key."</b> ".$value."\n";
		}

		$url  = "https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&parse_mode=html&text=".(urlencode($txt));
		$sendToTelegram = fopen($url,"r");
	}

	$resSend["html"] = "success";
}

echo json_encode($resSend);

?>