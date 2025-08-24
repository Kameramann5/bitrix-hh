<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */
$elementEdit = CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT");
$elementDelete = CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE");

?>
<?if(!empty($arResult["ITEMS"])):?>
			<?foreach($arResult["ITEMS"] as $key => $arItem):?>
				<?
				$this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], $elementEdit);
				$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], $elementDelete);
				?>
                <div class="icon" id="<?=$this->GetEditAreaId($arItem["ID"])?>">
                    <a target="_blank" href="<?=$arItem["PROPERTIES"]["NETWORK_URL"]["VALUE"]?>">

                        <img src=" <?=CFile::GetPath($arItem["PROPERTIES"]["NETWORK_IMG"]["VALUE"]);  ?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>"></a>
               <p
		               <?php if($arItem["PROPERTIES"]["NETWORK_COLOR"]["VALUE"]) { ?>
		               style="color:<?=$arItem["PROPERTIES"]["NETWORK_COLOR"]["VALUE"]?>"
               <?php } ?>
               
               ><?=$arItem["NAME"]?></p>
                </div>
			<?endforeach?>
<?endif;