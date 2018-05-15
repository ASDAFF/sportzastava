<?php
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\StringHelper;
use intec\constructor\structure\widget\Template as WidgetTemplate;
use intec\constructor\models\build\Template as SiteTemplate;

/**
 * @var array $properties
 * @var array $data
 * @var SiteTemplate $siteTemplate
 * @var WidgetTemplate $this
 */

$type = $data['type'];
$image = $data['image'];
$text = $data['text'];
?>
<div class="widget widget-logotype widget-default">
    <?php if ($type == 'image' && !empty($image['url'])) {
        $style = [];
        $style['background-image'] = 'url(\''.$image['url'].'\')';
        $style['background-size'] = $image['proportions'] ? 'contain' : '100% 100%';

        if (!empty($image['width']))
            $style['width'] = $image['width'];

        if (!empty($image['height']))
            $style['height'] = $image['height'];

        echo Html::tag('div', null, [
            'class' => 'widget-logotype-image',
            'style' => Html::cssStyleFromArray($style)
        ]);
    } else { ?>
        <div class="widget-logotype-text"><?= $text ?></div>
    <?php } ?>
    <div class="widget-logotype-aligner"></div>
</div>