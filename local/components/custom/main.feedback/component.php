<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$arResult["PARAMS_HASH"] = md5(serialize($arParams).$this->GetTemplateName());

$arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" && !$USER->IsAuthorized()) ? "Y" : "N");
$arParams["EVENT_NAME"] = trim($arParams["EVENT_NAME"]);
if($arParams["EVENT_NAME"] == '')
    $arParams["EVENT_NAME"] = "FEEDBACK_FORM";
$arParams["EMAIL_TO"] = trim($arParams["EMAIL_TO"]);
if($arParams["EMAIL_TO"] == '')
    $arParams["EMAIL_TO"] = COption::GetOptionString("main", "email_from");
$arParams["OK_TEXT"] = trim($arParams["OK_TEXT"]);
if($arParams["OK_TEXT"] == '')
    $arParams["OK_TEXT"] = GetMessage("MF_OK_MESSAGE");

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] <> '' && (!isset($_POST["PARAMS_HASH"]) || $arResult["PARAMS_HASH"] === $_POST["PARAMS_HASH"]))
{
    $arResult["ERROR_MESSAGE"] = array();
    if(check_bitrix_sessid())
    {
        if(empty($arParams["REQUIRED_FIELDS"]) || !in_array("NONE", $arParams["REQUIRED_FIELDS"]))
        {
            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) && mb_strlen($_POST["user_name"]) <= 1)
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_NAME");
            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) && mb_strlen($_POST["user_email"]) <= 1)
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_EMAIL");
            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])) && mb_strlen($_POST["MESSAGE"]) <= 3)
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_MESSAGE");
            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) && empty($_POST["user_phone"]))
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_PHONE");
            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("SELECT", $arParams["REQUIRED_FIELDS"])) && empty($_POST["user_select"]))
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_SELECT");
			
	        if((empty($arParams["REQUIRED_FIELDS"]) || in_array("URL", $arParams["REQUIRED_FIELDS"])) && empty($_POST["user_url"]))
		        $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_URL");
			
            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("DATE", $arParams["REQUIRED_FIELDS"])) && empty($_POST["user_date"]))
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_DATE");
            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("COUNT", $arParams["REQUIRED_FIELDS"])) && empty($_POST["user_count"]))
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_COUNT");
            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("TIME", $arParams["REQUIRED_FIELDS"])) && empty($_POST["user_time"]))
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_TIME");
            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("CHILD", $arParams["REQUIRED_FIELDS"])) && empty($_POST["user_child"]))
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_CHILD");
        }
        if(mb_strlen($_POST["user_email"]) > 1 && !check_email($_POST["user_email"]))
            $arResult["ERROR_MESSAGE"][] = GetMessage("MF_EMAIL_NOT_VALID");
        if($arParams["USE_CAPTCHA"] == "Y")
        {
            $captcha_code = $_POST["captcha_sid"];
            $captcha_word = $_POST["captcha_word"];
            $cpt = new CCaptcha();
            $captchaPass = COption::GetOptionString("main", "captcha_password", "");
            if ($captcha_word <> '' && $captcha_code <> '')
            {
                if (!$cpt->CheckCodeCrypt($captcha_word, $captcha_code, $captchaPass))
                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTCHA_WRONG");
            }
            else
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTHCA_EMPTY");

        }
        if(empty($arResult["ERROR_MESSAGE"]))
        {
            $arFields = Array(
                "AUTHOR" => $_POST["user_name"],
                "AUTHOR_EMAIL" => $_POST["user_email"],
                "PHONE" => $_POST["user_phone"],
                "SELECT" => $_POST["user_select"],
	            "URL" => $_POST["user_url"],
                "DATE" => $_POST["user_date"],
                "COUNT" => $_POST["user_count"],
                "TIME" => $_POST["user_time"],
                "CHILD" => $_POST["user_child"],
                "EMAIL_TO" => $arParams["EMAIL_TO"],
                "TEXT" => $_POST["MESSAGE"],
            );

            //бронь мероприятия
            if ($_POST["user_select"]) {
                CModule::IncludeModule('iblock');
                $el = new CIBlockElement;
                $PROP = array();
                $PROP[32] =$_POST["user_name"];
                $PROP[33] =$_POST["user_phone"];
                $PROP[34] =$_POST["user_select"];
                $PROP[35] =$_POST["user_url"];
                $arLoadProductArray = Array(
                    "ACTIVE_FROM" => "", // обязательно нужно указать дату начала активности элемента
                    "MODIFIED_BY" => $USER->GetID(), // указываем какой пользователь добавил элемент
                    "IBLOCK_SECTION_ID" => false, // В корне или нет
                    "IBLOCK_ID" => 18,
                    "NAME" => "Мероприятие",
                    "ACTIVE" => "Y", // активен или N не активен
                    "PREVIEW_TEXT" => "",
                    "DETAIL_TEXT" => "",
                    "PROPERTY_VALUES"=> $PROP,  // Добавим нашему элементу заданные свойства
                    "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/images.png")  // ссылка на детальную картинку
                );
                if($newElement = $el->Add($arLoadProductArray))  // с помощью Add добавляем новый элемент
                    echo "ID Нового элемента: ".$newElement;
                else
                    echo "Error: ".$el->LAST_ERROR;
            }
            //бронь стола
            if ($_POST["user_time"]) {
                CModule::IncludeModule('iblock');
                $el = new CIBlockElement;
                $PROP = array();
                $PROP[32] =$_POST["user_name"];
                $PROP[33] =$_POST["user_phone"];
                $PROP[34] =$_POST["user_select"];
                $PROP[35] =$_POST["user_url"];
                /*стол*/
                $PROP[36] =$_POST["user_email"];
                $PROP[37] =$_POST["user_child"];
                $PROP[38] =$_POST["user_time"];
                $PROP[39] =$_POST["user_count"];
                $PROP[40] =$_POST["user_date"];
                $arLoadProductArray = Array(
                    "ACTIVE_FROM" => "", // обязательно нужно указать дату начала активности элемента
                    "MODIFIED_BY" => $USER->GetID(), // указываем какой пользователь добавил элемент
                    "IBLOCK_SECTION_ID" => false, // В корне или нет
                    "IBLOCK_ID" => 18,
                    "NAME" => "Бронирование стола",
                    "ACTIVE" => "Y", // активен или N не активен
                    "PREVIEW_TEXT" => "",
                    "DETAIL_TEXT" => "",
                    "PROPERTY_VALUES"=> $PROP,  // Добавим нашему элементу заданные свойства
                    "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/images.png")  // ссылка на детальную картинку
                );
                if($newElement = $el->Add($arLoadProductArray))  // с помощью Add добавляем новый элемент
                    echo "ID Нового элемента: ".$newElement;
                else
                    echo "Error: ".$el->LAST_ERROR;
            }

            if(!empty($arParams["EVENT_MESSAGE_ID"]))
            {
                foreach($arParams["EVENT_MESSAGE_ID"] as $v)
                    if(intval($v) > 0)
                        CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields, "N", intval($v));
            }
            else
                CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields);
            $_SESSION["MF_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
            $_SESSION["MF_EMAIL"] = htmlspecialcharsbx($_POST["user_email"]);
            $event = new \Bitrix\Main\Event('main', 'onFeedbackFormSubmit', $arFields);
            $event->send();
            LocalRedirect($APPLICATION->GetCurPageParam("success=".$arResult["PARAMS_HASH"], Array("success")));
        }
        $arResult["MESSAGE"] = htmlspecialcharsbx($_POST["MESSAGE"]);
        $arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
        $arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_POST["user_email"]);
        $arResult["AUTHOR_PHONE"] = htmlspecialcharsbx($_POST["user_phone"]);
        $arResult["AUTHOR_SELECT"] = htmlspecialcharsbx($_POST["user_select"]);
	    $arResult["AUTHOR_URL"] = htmlspecialcharsbx($_POST["user_url"]);
        $arResult["AUTHOR_DATE"] = htmlspecialcharsbx($_POST["user_date"]);
        $arResult["AUTHOR_COUNT"] = htmlspecialcharsbx($_POST["user_count"]);
        $arResult["AUTHOR_TIME"] = htmlspecialcharsbx($_POST["user_time"]);
        $arResult["AUTHOR_CHILD"] = htmlspecialcharsbx($_POST["user_child"]);
    }
    else
        $arResult["ERROR_MESSAGE"][] = GetMessage("MF_SESS_EXP");
}
elseif($_REQUEST["success"] == $arResult["PARAMS_HASH"])
{
    $arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
}

if(empty($arResult["ERROR_MESSAGE"]))
{

    /*
    if($USER->IsAuthorized())
    {
        $arResult["AUTHOR_NAME"] = $USER->GetFormattedName(false);
        $arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($USER->GetEmail());
    }
    else
    {
        if($_SESSION["MF_NAME"] <> '')
            $arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_SESSION["MF_NAME"]);
        if($_SESSION["MF_EMAIL"] <> '')
            $arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_SESSION["MF_EMAIL"]);
    }*/
}

if($arParams["USE_CAPTCHA"] == "Y")
    $arResult["capCode"] =  htmlspecialcharsbx($APPLICATION->CaptchaGetCode());

$this->IncludeComponentTemplate();
