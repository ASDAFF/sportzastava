<div class="constructor-dialog constructor-dialog-gallery" data-bind="{
    bind: dialogs.list.gallery,
    with: dialogs.list
}">
    <div class="constructor-dialog-wrapper" data-bind="{
        with: gallery.data
    }">
        <div class="constructor-dialog-header">
            <div class="constructor-dialog-content-wrap">
                <div class="constructor-dialog-content">
                    <div class="constructor-dialog-content-wrapper">
                        <div class="constructor-dialog-content-wrapper-2">
                            <div class="constructor-dialog-title">
                                <?= GetMessage('container.modals.gallery.title') ?>
                            </div>
                            <div class="constructor-dialog-container">
                                <div class="constructor-dialog-search">
                                    <div class="constructor-icon search-icon"></div>
                                    <input
                                        type="text"
                                        class="constructor-dialog-search-input"
                                        placeholder="<?= GetMessage('container.modals.gallery.search') ?>"
                                        data-bind="{
                                            value: filter,
                                            valueUpdate: 'keyup'
                                        }"
                                    />
                                </div>
                            </div>
                            <div class="constructor-dialog-buttons">
                                <button class="constructor-dialog-button glyph-icon-window" data-bind="{
                                    click: $parent.gallery.expanded.switch
                                }"></button>
                                <button class="constructor-dialog-button glyph-icon-cancel" data-bind="{
                                    click: $parent.gallery.close
                                }"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="constructor-dialog-body">
            <div class="constructor-dialog-content-wrap">
                <div class="constructor-dialog-content">
                    <div class="constructor-dialog-gallery-images">
                        <div class="constructor-dialog-loader" data-bind="{
                            visible: updating
                        }">
                            <div class="constructor-loader constructor-loader-1"></div>
                        </div>
                        <div class="constructor-dialog-gallery-images-wrapper nano" data-bind="{
                            bind: $parent.gallery.scroll,
                            visible: !updating()
                        }">
                            <div class="constructor-dialog-gallery-images-wrapper-2 nano-content">
                                <div class="constructor-dialog-gallery-images-wrapper-3" data-bind="{
                                    foreach: images
                                }">
                                    <!-- ko if: $root.gallery.isImage($data) -->
                                        <div class="constructor-dialog-gallery-image" data-bind="{
                                            click: function () {
                                                $parents[1].gallery.select($data);
                                            }
                                        }">
                                            <div class="constructor-dialog-gallery-image-wrapper">
                                                <div class="constructor-dialog-gallery-image-wrapper-2">
                                                    <div class="constructor-dialog-gallery-image-aligner"></div>
                                                    <img class="constructor-dialog-gallery-image-view" data-bind="{
                                                        attr: {
                                                            'alt': name,
                                                            'src': path
                                                        }
                                                    }" />
                                                    <div class="constructor-dialog-gallery-content constructor-vertical-middle">
                                                        <div class="constructor-aligner"></div>
                                                        <div class="constructor-dialog-gallery-name" data-bind="{
                                                            text: name
                                                        }"></div>
                                                    </div>
                                                    <div class="constructor-dialog-gallery-delete" data-bind="{
                                                        click: $data.delete,
                                                        clickBubble: false
                                                    }">
                                                        <i class="glyph-icon-cancel"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- /ko -->
                                    <!-- ko if: !$root.gallery.isImage($data) -->
                                        <div class="constructor-dialog-gallery-image">
                                            <div class="constructor-dialog-gallery-image-wrapper">
                                                <div class="constructor-dialog-gallery-image-wrapper-2">
                                                    <div class="constructor-loader constructor-loader-1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- /ko -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="constructor-dialog-gallery-upload no-select" data-bind="{
                        bind: $parent.gallery.uploader.zone,
                        css: {
                            'constructor-dialog-gallery-upload-active': $parent.gallery.uploader.active
                        }
                    }">
                        <div class="constructor-dialog-gallery-icon constructor-icon picture-icon"></div>
                        <div class="constructor-dialog-gallery-title"><?= GetMessage('container.modals.gallery.load') ?></div>
                        <div class="constructor-dialog-gallery-text"><?= GetMessage('container.modals.gallery.drop.image') ?></div>
                    </div>
                    <input type="file" accept="image/*" style="display: none" data-bind="{
                        bind: $parent.gallery.uploader.node
                    }" />
                </div>
            </div>
        </div>
    </div>
    <?/*<div class="constructor-dialog-footer">
            <div class="constructor-gallery-unsplash no-select">
                <div class="constructor-icon photo-icon"></div>
                <div class="constructor-gallery-unsplash-content">
                    <div class="constructor-gallery-unsplash-text"><?= GetMessage('container.modals.gallery.load.image') ?></div>
                    <div class="constructor-gallery-unsplash-title">Unsplash</div>
                </div>
            </div>
        </div>*/?>
</div>