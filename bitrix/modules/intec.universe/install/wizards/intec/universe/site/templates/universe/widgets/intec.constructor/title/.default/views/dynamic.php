<?php
use intec\constructor\models\Build;
use intec\constructor\models\build\Template as BuildTemplate;
use intec\constructor\structure\widget\Template as WidgetTemplate;


/**
 * @var array $properties
 * @var Build $build
 * @var BuildTemplate $template
 * @var WidgetTemplate $this
 */
?>
<div class="intec-content">
    <div class="intec-content-wrapper">
        <h1 style="margin: 0;">
            <?= $this->getMessage('view.message') ?>
        </h1>
    </div>
</div>
