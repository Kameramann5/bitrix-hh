<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->addExternalCss(SITE_TEMPLATE_PATH . "/custom/css/banquets/style.css");
$areaId = "news_detail_".$this->randString();
?>
<div id="<?=$areaId?>">
    <div class="news-item">
        <div class="news-item__left">
            <h1 class="news-item__title"><?=$arResult["NAME"]?></h1>
            <?if($arResult["DISPLAY_ACTIVE_FROM"] !== ""):?>
                <div class="news-detai__item-date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
            <?endif?>
            <div class="news-item__img news-item__img_mobile">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>">
            </div>
            <?if($arResult["DETAIL_TEXT"] !== ""):?>
                <div class="news-item__text"><?=$arResult["DETAIL_TEXT"]?></div>
            <?endif?>
        </div>
        <div class="news-item__right mob-dn">
            <div class="news-item__img  news-item__img_desk">
                <?if(!empty($arResult["DETAIL_PICTURE"])):?>
                    <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>">
                <?endif?>
            </div>
        </div>
    </div>
    <?if(!empty($arResult["PROPERTIES"]["ADDITIONAL_TEXT"]["~VALUE"]["TEXT"])):?>
        <div>
            <?=$arResult["PROPERTIES"]["ADDITIONAL_TEXT"]["~VALUE"]["TEXT"]?>
        </div>
    <?endif?>
    <?if(!empty($arResult["PROPERTIES"]["VIEW_FORM"]["VALUE_ENUM_ID"])):?>

    <?php
    //проверить на дату окончания новости
        $date = $arResult["DATE_ACTIVE_TO"];
if (  $date ) {
    $date2= date("d.m.Y", strtotime($date));
    $a = date('d.m.Y');
    if($date2<$a) { include('end_event.php');}
    else {
        include('form.php');
    }
   }
else {
    include('form.php');
}

    ?>

    <?endif?>
    <?if(!empty($arResult["PROPERTIES"]["GALLERY"]["VALUE"])):?>
        <h2 class="gellery_title">Как прошло мероприятие</h2>
        <div class="gallery-news-list">
            <?php
            //цикл чередования блоков галереи
            $count=0; $count_two=0;
            $chunkPosts = array_chunk($arResult["PROPERTIES"]["GALLERY"]["VALUE"] ,3);
            foreach($chunkPosts as $posts){
                $count++;
                if(($count%2)==0) {     echo '<div class="right block">';    } else {
                    echo '<div class=" left block">';  }
                foreach($posts as $post){
                    $count_two++;
                    if($count_two>3) {$count_two=1;} ?>
                    <div class="block<?php echo  $count_two; ?>">
                        <a class="gallery-news-item" href="<?=$post["FULL"]?>" data-fancybox="banquet-gallery">
                            <img src="<?=$post["FULL"]?>" alt="<?=$post["DESCRIPTION"]?>">
                        </a>
                    </div>
                    <?php
                }
                echo '</div>';
            }
            foreach($arResult["PROPERTIES"]["GALLERY"]["VALUE"] as $pic):?>
            <?endforeach?>
        </div>
    <?endif?>
</div>