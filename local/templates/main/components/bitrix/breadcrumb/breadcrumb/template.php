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
<div class="bx-breadcrumb-item"> 
<a href="/">Главная</a><svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.71 0.706145L4.3 3.29615C4.3927 3.38866 4.46625 3.49855 4.51643 3.61952C4.56662 3.74049 4.59245 3.87018 4.59245 4.00115C4.59245 4.13211 4.56662 4.2618 4.51643 4.38277C4.46625 4.50374 4.3927 4.61363 4.3 4.70615L1.71 7.29615C1.08 7.92615 9.53674e-07 7.47615 9.53674e-07 6.58615V1.40615C9.53674e-07 0.516145 1.08 0.0761452 1.71 0.706145Z" fill="black"/>
</svg>

</div>
';
$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.71 0.706145L4.3 3.29615C4.3927 3.38866 4.46625 3.49855 4.51643 3.61952C4.56662 3.74049 4.59245 3.87018 4.59245 4.00115C4.59245 4.13211 4.56662 4.2618 4.51643 4.38277C4.46625 4.50374 4.3927 4.61363 4.3 4.70615L1.71 7.29615C1.08 7.92615 9.53674e-07 7.47615 9.53674e-07 6.58615V1.40615C9.53674e-07 0.516145 1.08 0.0761452 1.71 0.706145Z" fill="black"/>
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
