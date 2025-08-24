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
	$arrow = ($index > 0? '<svg width="6" height="8" viewBox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.50623 0.706267L5.09623 3.29627C5.18893 3.38878 5.26248 3.49867 5.31266 3.61964C5.36284 3.74062 5.38867 3.8703 5.38867 4.00127C5.38867 4.13224 5.36284 4.26192 5.31266 4.38289C5.26248 4.50386 5.18893 4.61375 5.09623 4.70627L2.50623 7.29627C1.87623 7.92627 0.796227 7.47627 0.796227 6.58627V1.40627C0.796227 0.516267 1.87623 0.0762673 2.50623 0.706267Z" fill="black"/>
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
