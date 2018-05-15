<div class="constructor-dialog" data-bind="{
    bind: dialogs.list.script,
    with: dialogs.list
}">
    <div class="constructor-dialog-wrapper">
        <div class="constructor-dialog-header">
            <div class="constructor-dialog-content-wrap">
                <div class="constructor-dialog-content">
                    <div class="constructor-dialog-content-wrapper">
                        <div class="constructor-dialog-content-wrapper-2">
                            <div class="constructor-dialog-title">
                                <?= GetMessage('container.modals.script.title') ?>
                            </div>
                            <div class="constructor-dialog-container"></div>
                            <div class="constructor-dialog-buttons">
                                <button class="constructor-dialog-button glyph-icon-cancel" data-bind="{
                                    click: script.close
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
                    <div class="constructor-dialog-script">
                        <textarea data-bind="{
                            bind: script.editor
                        }"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>