<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use intec\core\base\Collection;
use intec\constructor\models\build\Template;

global $displayMenu;
global $displayBackground;

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global Collection $settings
 * @global Template $template
 * @global boolean $displayMenu
 */

?>
            <?php if ($displayMenu) { ?>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php if ($displayBackground) { ?>
            </div>
        </div>
    <?php } ?>
    <div class="intec-template-footer">
        <?php if ($settings->get('footer_show_feedback')) { ?>
            <?php $APPLICATION->IncludeComponent(
                'bitrix:main.include',
                '.default',
                array(
                    'AREA_FILE_SHOW' => 'file',
                    'PATH' => SITE_DIR.'/include/footer/form.php'
                ),
                false,
                array('HIDE_ICONS' => 'Y')
            ); ?>
        <?php } ?>
        <?php $APPLICATION->IncludeComponent(
            'bitrix:main.include',
            '.default',
            array(
                'AREA_FILE_SHOW' => 'file',
                'PATH' => SITE_DIR.'/include/footer/base.php'
            ),
            false,
            array('HIDE_ICONS' => 'Y')
        ); ?>
    </div>
</div>