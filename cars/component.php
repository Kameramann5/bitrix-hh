<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

global $USER;

if(!$USER->IsAuthorized())
{
    ShowError("Доступ запрещён. Авторизуйтесь.");
    return;
}

// Получаем параметры времени из GET (или из $arParams)
$start = htmlspecialcharsbx($_GET['start'] ?? '');
$end = htmlspecialcharsbx($_GET['end'] ?? '');

if (!$start || !$end)
{
    ShowError("Укажите время начала и окончания поездки.");
    return;
}

if (!\Bitrix\Main\Type\DateTime::isCorrect($start, "Y-m-d H:i:s") || !\Bitrix\Main\Type\DateTime::isCorrect($end, "Y-m-d H:i:s"))
{
    ShowError("Неверный формат даты. Ожидается Y-m-d H:i:s");
    return;
}

use Bitrix\Main\Type\DateTime;

$startDate = DateTime::createFromUserTime($start);
$endDate = DateTime::createFromUserTime($end);

if($startDate >= $endDate)
{
    ShowError("Время начала должно быть меньше времени окончания.");
    return;
}

CModule::IncludeModule('iblock');

// ID инфоблока автомобилей (укажите своё)
$IBLOCK_ID_CARS = 5;
// ID инфоблока бронирования автомобилей (укажите своё)
$IBLOCK_ID_BOOKINGS = 6;

// Получим список всех автомобилей
$arCars = [];
$res = CIBlockElement::GetList([], ['IBLOCK_ID' => $IBLOCK_ID_CARS, 'ACTIVE' => 'Y'], false, false, ['ID', 'NAME', 'PROPERTY_CATEGORY', 'PROPERTY_DRIVER']);

while($car = $res->GetNext())
{
    $arCars[$car['ID']] = $car;
}

// Теперь исключим из $arCars те, которые заняты в указанный период

// Логика проверки занятости:
// В инфоблоке бронирования для каждого объекта есть дата начала и дата окончания брони и ID автомобиля

// Получаем брони на пересекающийся период
$arFilterBookings = [
    'IBLOCK_ID' => $IBLOCK_ID_BOOKINGS,
    'ACTIVE' => 'Y',
    [
        'LOGIC' => 'AND',
        [
            '>=' => ['PROPERTY_DATE_START' => $startDate->toString()],
        ],
        [
            '<=' => ['PROPERTY_DATE_END' => $endDate->toString()],
        ],
    ],
];

$rsBookings = CIBlockElement::GetList([], $arFilterBookings, false, false, ['ID', 'PROPERTY_CAR']);

$busyCarIds = [];
while($booking = $rsBookings->Fetch())
{
    $carId = $booking['PROPERTY_CAR_VALUE'];
    if($carId)
        $busyCarIds[$carId] = true;
}

// Фильтруем свободные авто
$arFreeCars = [];
foreach($arCars as $carId => $car)
{
    if(!isset($busyCarIds[$carId]))
    {
        $arFreeCars[] = $car;
    }
}

// Передаём данные в шаблон
$arResult['CARS'] = $arFreeCars;
$arResult['START'] = $startDate->format("d.m.Y H:i");
$arResult['END'] = $endDate->format("d.m.Y H:i");

$this->IncludeComponentTemplate();