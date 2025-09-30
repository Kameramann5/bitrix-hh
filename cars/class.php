<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

class CCustomCars extends CBitrixComponent
{
    public function executeComponent()
    {
        $this->includeComponentTemplate();
    }

    public static function getCarsItemData($iblock_time,$formattedStart, $formattedEnd,$model,$category_GET,$driver_GET)
    { 
        $arrayEvents = []; // инициализация массива

        if (CModule::IncludeModule("iblock")) {
            // Получить все автомобили 5  и их бренды
            $carNames = [];
            $carBrands = []; 
            $category = []; 
            global $USER; // убедитесь, что глобальная переменная объявлена
            $groups = $USER->GetUserGroupArray();
            //начальник   
            if (in_array(6, $groups)) {
                //echo "Пользователь принадлежит группе 6 Начальник.";
                $Perm=1;
            } 
            //младшие рабочие  
            elseif (in_array(7, $groups)) {
                //echo "Пользователь принадлежит группе Младшие рабочие.";
                $Perm=3;
            } 
            //средние рабочие
            elseif (in_array(8, $groups)) {
                //echo "Пользователь принадлежит группе Средние рабочие.";
                $Perm=2;
            } else {
                $Perm='';
                //echo "Пользователь не принадлежит группам Начальник, младшие рабочие или средние рабочие.";
            }
            $arFilterCars = [
                "IBLOCK_ID" => 5,
                "ACTIVE" => "Y",
                "PROPERTY_CATEGORY_VALUE"=> $Perm,
            ];
            $arSelectCars =   ["ID", "NAME", "PROPERTY_BRAND", "PROPERTY_CATEGORY", "PROPERTY_DRIVER"];
            
            $arOrder = ["NAME" => "ASC"];
            
            $res_cars = CIBlockElement::GetList(
                $arOrder,
                $arFilterCars,
                false,
                false,
                $arSelectCars
            );
            
            
            while ($carItem = $res_cars->GetNext()) {
                $carID = $carItem['ID'];
                $carNames[$carID] = $carItem['NAME'];
                // Связанный бренд, предположим, что это свойство с номером 'PROPERTY_BRAND'
                // Обычно, свойство хранится как массив или значение
                $carBrands[$carID] = $carItem['PROPERTY_BRAND_VALUE']; // или 'PROPERTY_BRAND' если так возвращается
                $carCategory[$carID] = $carItem['PROPERTY_CATEGORY_VALUE'];
                $carDriver[$carID] = $carItem['PROPERTY_DRIVER_VALUE'];
            }
        
            // Получение элементов инфоблока 6 Время бронирования
            $arFilter = [
                "IBLOCK_ID" => $iblock_time,
                "ACTIVE" => "Y",
              
                "<=ACTIVE_FROM" => $formattedStart,
                ">=ACTIVE_TO" => $formattedEnd,
                "PROPERTY_BRON" => false,
            ];
            $arSelect = [
                "ID",
                "NAME",
                "PROPERTY_CAR",
                "PROPERTY_BRON",
                "ACTIVE_FROM",
                "ACTIVE_TO"
            ];
            
            $arOrder = ["NAME" => "ASC"];
            
            $res_time = CIBlockElement::GetList(
                $arOrder,
                $arFilter,
                false,
                false,
                $arSelect
            );
            
            $arrayEvents = [];
        
            while ($item = $res_time->GetNext()) {
                $ID_6 = $item['ID'];
                $ACTIVE_FROM = $item['ACTIVE_FROM'];
                $ACTIVE_TO = $item['ACTIVE_TO'];
                $BRON = $item['PROPERTY_BRON_VALUE'];
                $propertyCarID = $item['PROPERTY_CAR_VALUE']; // ID автомобиля
                $propertyBrandID = $item['PROPERTY_BRAND_VALUE']; // В этом случае — ID бренда
                $propertyCategory = $item['PROPERTY_CATEGORY_VALUE'];
                $propertyDriver = $item['PROPERTY_DRIVER_VALUE'];
                // Получим название автомобиля
                $carName = isset($carNames[$propertyCarID]) ? $carNames[$propertyCarID] : '';
                // Получить название бренда по ID
                $propertyBrandID = isset($carBrands[$propertyCarID]) ? $carBrands[$propertyCarID] : '';
                $propertyCategory = isset($carCategory[$propertyCarID]) ? $carCategory[$propertyCarID] : '';
                $propertyDriver = isset($carDriver[$propertyCarID]) ? $carDriver[$propertyCarID] : '';
            // Получить название бренда по ID из инфоблока 8 Бренды
            $brandName = '';
            if ($propertyBrandID) {
                $res_brand = CIBlockElement::GetList(
                    [], 
                    ["IBLOCK_ID" => 8, "ID" => $propertyBrandID],
                    false,
                    false,
                    ["ID", "NAME"]
                );
                if ($brandItem = $res_brand->GetNext()) {
                    $brandName = $brandItem['NAME'];
                }
            }
             // Получить имена водителей по ID из инфоблока 7 Водители
             $driverName = '';
             if ($propertyDriver) {
                 $res_driver = CIBlockElement::GetList(
                     [], 
                     ["IBLOCK_ID" => 7, "ID" => $propertyDriver],
                     false,
                     false,
                     ["ID", "NAME"]
                 );
                 if ($driverItem = $res_driver->GetNext()) {
                     $driverName = $driverItem['NAME'];
                 }
             }
           
             if ($propertyBrandID == $model && $propertyCategory ==$category_GET && $propertyDriver == $driver_GET) {
                $arrayEvents['cars'][] = [
                    'ID' => $ID_6,
                    'BRON' => $BRON,
                    'PROPERTY_CAR' => $propertyCarID,
                    'CAR_ID' => $carName,
                    'BRAND_NAME' => $brandName,
                    'CATEGORY' => $propertyCategory,
                    'BRAND_ID' => $propertyBrandID,
                    'ACTIVE_FROM' => $ACTIVE_FROM,
                    'ACTIVE_TO' => $ACTIVE_TO,
                    'DRIVER' => $propertyDriver,
                    'DRIVER_NAME' => $driverName,
                ];
            }
            }
        }
        return $arrayEvents;
    }
}