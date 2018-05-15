<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
/**
 * @var array $data
 */
if ($data['state'] == 'loading') {
	$this->getProperties()->set('menu_display', 'N');
}