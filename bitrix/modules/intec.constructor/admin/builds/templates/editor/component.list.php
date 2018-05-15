<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
global $APPLICATION;

if (!CModule::IncludeModule('intec.constructor'))
    return;

IncludeModuleLangFile(__FILE__);

$treeComponents = CComponentUtil::GetComponentsTree();
?>
<?
function drawTreeComponents($Node, $depthLevel) {
    if (array_key_exists('#', $Node) && is_array($Node)) {
        foreach ($Node['#'] as $codeNode=>$codeChildNode) {?>

                <div class="component-list-section <?=($depthLevel==1)?'component-list-root-section':''?>">
                    <div class="component-list-section-name
                                <?=($depthLevel==1)?'component-list-root-section-name':''?>
                                <?=($depthLevel==2)?'component-list-child-section-name':''?>
                                <?//=($depthLevel==3)?'component-list-last-section-name':''?>">
                        <?=(!empty($codeChildNode['@']['NAME']))?$codeChildNode['@']['NAME']:$codeNode?>
                    </div>
                    <?if (array_key_exists('*', $codeChildNode) || array_key_exists('#', $codeChildNode)) {?>
                        <div class="component-list-section-structure">
                            <? if (array_key_exists('#', $codeChildNode) && is_array($codeChildNode) && $depthLevel==1) {
                                drawTreeComponents($codeChildNode,$depthLevel+1);
                            }?>
                            <? if (array_key_exists('*', $codeChildNode) && is_array($codeChildNode)) {?>
                                <ul class="component-list-component-ul">
                                <?foreach ($codeChildNode['*'] as $component) {?>
                                    <li class="component-list-component-name" data-component-name="<?=$component['TITLE']?>" data-component-code="<?=$component['NAME']?>">
                                        <div class="component-list-marker"></div>
                                        <div class="component-list-component-name-value">
                                            <?=(!empty($component['TITLE']))?$component['TITLE']:$component['NAME']?>
                                        </div>
                                    </li>
                                <?}?>
                                <?if ($depthLevel==2) {
                                    drawListComponent($codeChildNode);
                                }?>
                                </ul>
                            <?} else {?>
                                <?if ($depthLevel==2) {?>
                                    <ul class="component-list-component-ul">
                                    <?drawListComponent($codeChildNode);?>
                                    </ul>
                                <?}?>
                            <?}?>
                        </div>
                    <?}?>
                </div>
       <? }
    }
}

function drawListComponent($Node) {
    if (array_key_exists('#', $Node) && is_array($Node))
    foreach ($Node['#'] as $codeNode=>$codeChildNode) {
        if (array_key_exists('*', $codeChildNode) && is_array($codeChildNode)) {
            foreach ($codeChildNode['*'] as $component) {?>
                <li class="component-list-component-name" data-component-name="<?$component['TITLE']?>" data-component-code="<?=$component['NAME']?>">
                    <div class="component-list-marker"></div>
                    <div class="component-list-component-name-value">
                        <?=(!empty($component['TITLE']))?$component['TITLE']:$component['NAME']?>
                    </div>
                </li>
                <?drawListComponent($codeChildNode);
            }
        }
    }
}
?>

<div id="component-list" class="component-list">
    <?/*<div  class="component-list-search">
        <div class="component-list-search-wrap">
            <input class="component-list-search-input" type="text" placeholder="<?=GetMessage('component.list.search');?>">
            <div class="component-list-search-icon"></div>
        </div>
    </div>
    */?>
    <div class="component-list-search-empty">
        <?=GetMessage('component.list.search_empty')?>
    </div>
    <div class="component-list-content">

        <?
            drawTreeComponents($treeComponents, 1);
        ?>
    </div>
</div>

<script>
    $('#component-list').on('click', '.component-list-component-name', function() {
        $('.component-list-component-name').removeClass('component-list-component-active');
        $(this).addClass('component-list-component-active');
    });

    $('#component-list').on('click', '.component-list-section-name', function() {
       if ($(this).hasClass('component-list-section-active')) {
           $(this).removeClass('component-list-section-active');
       } else {
           $(this).addClass('component-list-section-active');
       }
    });

    $('#constructor-dialog-component-search-input').on('keyup', function(){
        var valueSearch = $.trim($(this).val()).toLowerCase();
        var classSearchMode = 'component-list-params-search';
        var classSearchProp = 'component-list-component-search';
        var classSearchParent = 'component-list-parent-search';
        var classSearchGroup = 'component-list-group-search';
        var searchIndexRes = -1;
        var searchResultEmpty = true;
        var parentGroup;

        $('.component-list-search-empty').hide();

        $('.component-list-component-name').removeClass(classSearchProp);
        $('.component-list-section').removeClass(classSearchParent);

        if (valueSearch == '') {
            $('.component-list-content').removeClass(classSearchMode);
        } else {
            if (!$('.component-list-content').hasClass(classSearchMode)) {
                $('.component-list-content').addClass(classSearchMode);
            }

            $('.component-list-component-name[data-component-name]').each(function() {
                codeProp = $(this).attr('data-component-name').toLowerCase();
                searchIndexRes = (codeProp.indexOf(valueSearch));
                if ( searchIndexRes >= 0 ) {
                    $(this).addClass(classSearchProp);
                    /*parentGroup = $(this).parents(".component-list-section");
                    parentGroup.addClass(classSearchParent);*/
                    $(this).parents(".component-list-section").addClass(classSearchParent);

                    searchResultEmpty = false;
                    searchIndexRes = -1;
                }
            });

            if (searchResultEmpty) {
                $('.component-list-search-empty').show();
            }
        }
    });

</script>
