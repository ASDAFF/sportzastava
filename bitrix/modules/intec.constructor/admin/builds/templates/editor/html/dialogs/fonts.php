<div class="constructor-dialog constructor-dialog-fonts"
     data-bind="bind: dialogs.fonts, with: externalFonts">
    <div class="constructor-dialog-header">
        <ul class="constructor-dialog-fonts_filter_categories constructor-dialog-header_item">
            <li class="constructor-dialog-fonts_filter_category_sans"
                title="Sans">aa</li>
            <li class="constructor-dialog-fonts_filter_category_sefi"
                title="Serif">aa</li>
            <li class="constructor-dialog-fonts_filter_category_hand"
                title="Handwriting">aa</li>
            <li class="constructor-dialog-fonts_filter_category_mono"
                title="Monospacing">aa</li>
        </ul>
        <div class="constructor-dialog-fonts_filter_subset constructor-dialog-header_item">
            <select class="constructor-input constructor-input_light"
                    placeholder="<?= GetMessage('container.modals.fonts.subset') ?>"
                    data-bind="value: filter.subset, bind: $root.bindings.styler">
                <? foreach ($fontSubsets as $item) { ?>
                    <option value="<?= $item ?>"><?= GetMessage('container.modals.fonts.subset.'.$item) ?></option>
                <? } ?>
            </select>
        </div>
        <div class="constructor-dialog-search constructor-dialog-header_item">
            <div class="constructor-icon search-icon"></div>
            <input type="text"
                   class="constructor-dialog-search-input"
                   data-bind="value: filter.family, valueUpdate: 'keyup'"
                   placeholder="<?= GetMessage('container.modals.gallery.search') ?>" />
        </div>
        <div class="constructor-dialog-top-buttons">
            <span class="constructor-dialog-expand fa fa-window-maximize"></span>
            <button type="button" class="constructor-dialog-close fa fa-close"></button>
        </div>
    </div>
    <div class="constructor-dialog-body">
        <div class="constructor-dialog-fonts_wrapper nano" data-bind="bind: $root.dialogs.fonts.scroll">
            <div class="constructor-dialog-fonts_list nano-content" data-bind="foreach: list">
                <div class="constructor-dialog-fonts_item" data-bind="css: added() ? 'added' : ''">
                    <div class="constructor-dialog-fonts_item_status fa fa-check"></div>
                    <div class="constructor-dialog-fonts_item_button"
                         data-bind="click: added() ? remove : add">
                        <i class="fa fa-plus"></i>
                        <i class="fa fa-minus"></i>
                    </div>
                    <div class="constructor-dialog-fonts_item_name" data-bind="text: family"></div>
                </div>
            </div>
        </div>
    </div>
</div>