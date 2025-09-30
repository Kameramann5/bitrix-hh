<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Iblock;
use Bitrix\Main\IO;
use Bitrix\Main\Web\File;
if ($_SERVER["REQUEST_METHOD"] == "POST" && check_bitrix_sessid()) {
echo "1111";

}


require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");