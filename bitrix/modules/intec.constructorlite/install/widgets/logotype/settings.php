<div class="widget-logotype-settings">
    <div class="constructor-row">
        <div class="constructor-form-group">
            <div class="constructor-form-content">
                <div class="widget-logotype-type">
                    <div class="widget-logotype-button" data-bind="{
                        css: { 'widget-logotype-button-active': type.value() === type.values()[0] },
                        click: function () { type.value(type.values()[0]); }
                    }"><?= $this->getMessage('settings.type.image') ?></div>
                    <div class="widget-logotype-button" data-bind="{
                        css: { 'widget-logotype-button-active': type.value() === type.values()[1] },
                        click: function () { type.value(type.values()[1]); }
                    }"><?= $this->getMessage('settings.type.text') ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="constructor-row">
        <div class="constructor-form-group">
            <div class="constructor-form-content constructor-vertical-middle">
                <div style="margin-right: 10px;">
                    <input type="checkbox" data-bind="{
                        bind: ko.models.switch(),
                        checked: link
                    }" />
                </div>
                <div><?= $this->getMessage('settings.link') ?></div>
            </div>
        </div>
    </div>
    <!-- ko if: type.value() === type.values()[1] -->
    <div class="constructor-row">
        <div class="constructor-form-group">
            <div class="constructor-form-label">
                <span><?= $this->getMessage('settings.text.content') ?></span>
            </div>
            <div class="constructor-form-content">
                <textarea data-bind="{
                    bind: ko.models.ckeditor({}, text)
                }"></textarea>
            </div>
        </div>
    </div>
    <!-- /ko -->
    <!-- ko if: type.value() === type.values()[0] -->
    <div class="constructor-row">
        <div class="constructor-form-group">
            <div class="constructor-form-label">
                <?= $this->getMessage('settings.image.content') ?>
            </div>
            <div class="constructor-form-content constructor-settings-background-image-wrapper" style="text-align: center;">
                <div class="constructor-button constructor-button-block constructor-button-blue constructor-button-size-2 constructor-button-font-16"
                    data-bind="{ click: function () {
                        $root.dialogs.list.gallery.open(function (data) {
                            image.url(data.value);
                            return true;
                        });
                    }}"
                ><?= $this->getMessage('settings.image.gallery') ?></div>
                <div class="constructor-background-image-wrapper" data-bind="css: { 'has-image': image.url }">
                    <div class="constructor-background-image" data-bind="{
                        style: {
                            backgroundImage: image.calculated
                        }
                    }" style="
                        background-position: center;
                        background-size: contain;
                        background-repeat: no-repeat;
                    "></div>
                </div>
                <div style="text-align: left;">
                    <input type="text" class="constructor-input" style="width: 100%;" placeholder="<?= $this->getMessage('settings.image.url') ?>" data-bind="{
                        value: image.url
                    }">
                </div>
                <div class="constructor-button constructor-button-block constructor-button-default constructor-button-size-2 constructor-button-font-16" data-bind="{
                    click: function () { image.url(null); }
                }"><?= $this->getMessage('settings.image.remove') ?></div>
            </div>
        </div>
    </div>
    <div class="constructor-row">
        <div class="constructor-form-group">
            <div class="constructor-form-label">
                <?= $this->getMessage('settings.image.height') ?>
            </div>
            <div class="constructor-form-content">
                <input type="text" class="constructor-input" data-bind="{
                    value: image.height.value
                }" />
            </div>
        </div>
        <div class="constructor-form-group">
            <div class="constructor-form-label">
                <?= $this->getMessage('settings.image.width') ?>
            </div>
            <div class="constructor-form-content">
                <input type="text" class="constructor-input" data-bind="{
                    value: image.width.value
                }" />
            </div>
        </div>
        <div class="constructor-form-group">
            <div class="constructor-form-content constructor-vertical-middle">
                <div style="margin-right: 10px;">
                    <input type="checkbox" data-bind="{
                        bind: ko.models.switch(),
                        checked: image.proportions
                    }" />
                </div>
                <div><?= $this->getMessage('settings.image.proportions') ?></div>
            </div>
        </div>
    </div>

    <!-- /ko -->
</div>