<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */
global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";
$strReturn = '';
//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
	$strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}
$strReturn .= '<div class="bx-breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">

';
$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.00574 0.706633L4.59574 3.29663C4.68844 3.38915 4.76199 3.49904 4.81217 3.62001C4.86235 3.74098 4.88818 3.87067 4.88818 4.00163C4.88818 4.1326 4.86235 4.26228 4.81217 4.38326C4.76199 4.50423 4.68844 4.61412 4.59574 4.70663L2.00574 7.29663C1.37574 7.92663 0.295739 7.47663 0.295739 6.58663V1.40663C0.295739 0.516633 1.37574 0.0766335 2.00574 0.706633Z" fill="white"/>
</svg>
' : '');
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<div class="bx-breadcrumb-item" id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				'.$arrow.'
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">
					<span itemprop="name">'.$title.'</span>
				</a>
				<meta itemprop="position" content="'.($index + 1).'" />
			</div>';
	}
	else
	{
		$strReturn .= '
			<div class="bx-breadcrumb-item-end">
				'.$arrow.'
				<span>'.$title.'</span>
			</div>';
	}
}
$strReturn .= '<div style="clear:both"></div></div>';
return $strReturn;
