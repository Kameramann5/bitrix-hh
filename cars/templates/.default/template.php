<?php
   if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
   $areaId = "Script_".$this->randString();
   use Bitrix\Main\GroupTable;
   
   ?>
<!-- Форма для выбора времени -->
<form method="get" action="">
   <label for="start">Время начала:</label>
   <input type="datetime-local" id="start" name="start" value="<?= htmlspecialcharsbx($_GET['start'] ?? '') ?>" required>
   <br><br>
   <label for="end">Время окончания:</label>
   <input type="datetime-local" id="end" name="end" value="<?= htmlspecialcharsbx($_GET['end'] ?? '') ?>" required>
   <br><br>
   <?php
      if (CModule::IncludeModule("iblock")) {
      $iblockId = 8;
      
      $arFilter = [
        "IBLOCK_ID" => $iblockId,
        "ACTIVE" => "Y",
      ];
      
      $arSelect = [
        "ID",
        "NAME",
      ];
      $arOrder = ["NAME" => "ASC"];
      $res = CIBlockElement::GetList(
        $arOrder,
        $arFilter,
        false,
        false,
        $arSelect
      );
      $autos = [];
      while ($element = $res->GetNext()) {
        $autos[] = [
            "ID" => $element["ID"],	
            "NAME" => $element["NAME"],
           
        ];
      }
      ?>
   <label for="model">Модель:</label>
   <select name="model" id="">
      <?php
         foreach($autos as $auto): 
         ?>
      <option value="<?=$auto["ID"]?>"
         <?php
            if($auto["ID"]==$_GET['model']) {
            	echo "selected";
            }
            ?>
         ><?=$auto["NAME"]?> <?=$auto["ID"]?></option>
      <?php endforeach; ?>
   </select>
   <br><br>
   <label for="class">Категория комфорта:</label>
   <select name="class" id="">
      <option value="1"
         <?php
            if("1"==$_GET['class']) {
            	echo "selected";
            }
            ?>
         >1</option>
      <option value="2"
         <?php
            if("2"==$_GET['class']) {
            	echo "selected";
            }
            ?>
         >2</option>
      <option value="3"
         <?php
            if("3"==$_GET['class']) {
            	echo "selected";
            }
            ?>
         >3</option>
   </select>
   <br><br>
   <?php
      $iblockId = 7;
      
      $arFilter = [
          "IBLOCK_ID" => $iblockId,
          "ACTIVE" => "Y",
      ];
      
      $arSelect = [
          "ID",
          "NAME",
      ];
      $arOrder = ["NAME" => "ASC"];
      $res = CIBlockElement::GetList(
          $arOrder,
          $arFilter,
          false,
          false,
          $arSelect
      );
      $drivers = [];
      while ($element = $res->GetNext()) {
          $drivers[] = [
              "ID" => $element["ID"],	
              "NAME" => $element["NAME"],
             
          ];
      }
      ?>
   <label for="driver">Водитель:</label>
   <select name="driver" id="">
      <?php
         foreach($drivers as $driver): 
         ?>
      <option value="<?=$driver["ID"]?>"
         <?php
            if($driver["ID"]==$_GET['driver']) {
            	echo "selected";
            }
            ?>
         ><?=$driver["NAME"]?> <?=$driver["ID"]?></option>
      <?php endforeach; ?>
   </select>
   <br><br>
   <input type="submit" value="Показать свободные автомобили">
</form>
<br><br>
<?php 
   }
   ?>
<?php if(isset($_GET['start']) && isset($_GET['end'])): ?>
<?php
   // Получение и преобразование времени
   $startInput = $_GET['start'];
   $endInput = $_GET['end'];
   $model = $_GET['model'];
   $category_GET = $_GET['class'];
   $driver_GET = $_GET['driver'];
   
   $dateTimeStart = new DateTime($startInput);
   $formattedStart = $dateTimeStart->format('d.m.Y H:i');
   $dateTimeEnd = new DateTime($endInput);
   $formattedEnd = $dateTimeEnd->format('d.m.Y H:i');
   
   
   
   ?>
<?php endif; ?>
<table border="1" cellpadding="5" cellspacing="0">
   <thead>
      <tr>
         <th>id</th>
         <th>id Машина</th>
         <th>id Бренд</th>
         <th>Бренд</th>
         <th>Категория комфорта</th>
         <th>Начало</th>
         <th>Конец</th>
         <th>Бронь</th>
         <th>id Водитель</th>
         <th>Водитель</th>
      </tr>
   </thead>
   <tbody>
      <?php 
         // Получаем массив
         $arrayData = CCustomCars::getCarsItemData(6, $formattedStart, $formattedEnd,$model,$category_GET,$driver_GET);
         
         // Проверяем, есть ли ключ 'cars' и он не пустой
         if (!empty($arrayData['cars'])) {
             foreach ($arrayData['cars'] as $car) {
                 ?> 
      <tr>
         <td><?= htmlspecialchars($car["ID"]) ?></td>
         <td><?= htmlspecialchars($car["CAR_ID"]) ?></td>
         <td><?= htmlspecialchars($car["BRAND_ID"]) ?></td>
         <td><?= htmlspecialchars($car["BRAND_NAME"]) ?></td>
         <td><?= htmlspecialchars($car["CATEGORY"]) ?></td>
         <td><?= htmlspecialchars($car["ACTIVE_FROM"]) ?></td>
         <td><?= htmlspecialchars($car["ACTIVE_TO"]) ?></td>
         <td><?= htmlspecialchars($car["BRON"]) ?></td>
         <td><?= htmlspecialchars($car["DRIVER"]) ?></td>
         <td><?= htmlspecialchars($car["DRIVER_NAME"]) ?></td>
      </tr>
      <?php
         }
         } else {
         echo "Нет данных для вывода.";
         }
         ?>
   </tbody>
</table>



<? $jsParams = [
   "url" => $this->GetFolder() . "/view.php",
   "areaId" => $areaId,
   ] ?>
<script>new Script(<?=CUtil::PhpToJSObject($jsParams, false, false, true)?>)</script>