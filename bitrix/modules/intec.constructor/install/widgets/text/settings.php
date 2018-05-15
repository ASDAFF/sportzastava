<?php
use intec\constructor\structure\Widget;

/**
 * @var Widget $this
 */
?>
<div class="constructor-row">
    <div class="constructor-form-group">
        <div class="constructor-form-label">
            <?= $this->getMessage('field.text') ?>
        </div>
        <div class="constructor-form-content">
            <textarea class="constructor-input constructor-input-block" data-bind="{
                bind: ko.models.ckeditor({}, text)
            }"></textarea>
        </div>
    </div>
</div>
