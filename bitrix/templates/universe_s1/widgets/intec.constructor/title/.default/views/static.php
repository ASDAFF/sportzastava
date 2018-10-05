<?php
use intec\constructor\models\Build;
use intec\constructor\models\build\Template as BuildTemplate;
use intec\constructor\structure\widget\Template as WidgetTemplate;

global $APPLICATION;
/**
 * @var array $properties
 * @var Build $build
 * @var BuildTemplate $template
 * @var WidgetTemplate $this
 */
$tags = (count(explode('/',$APPLICATION->GetCurDir())) == 4) ? "div" : "h1";
?>
<div class="intec-content">
    <div class="intec-content-wrapper">
        <<?=$tags?> style="margin: 0;font-size:30px;">
            <? $APPLICATION->ShowTitle('header') ?>
        </<?=$tags?>>
    </div>
</div>

