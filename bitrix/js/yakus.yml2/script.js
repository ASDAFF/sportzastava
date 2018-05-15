var Dialog = new BX.CDialog({
    title: "",
    head: '',
    content: '<form method="POST" style="overflow:hidden;" action="/" id="dialog">\
                            \
                            </form>',
    icon: 'head-block',

    resizable: true,
    draggable: true,
    width: '500',
    height: '500'
});

function saveSectionLink(t){
    var sections = '';

    var sections_el = '';
    $('#'+$(t).attr('data-parent')).find('#tree_iblock_section_for_link input[name="SECTIONS[]"]:checked').each(function(){
        if(sections_el.length > 0)sections_el += ' ';
        sections_el += $(this).val();
    })

    if(sections.length > 0 || sections_el.length > 0 || $('#'+$(t).attr('data-parent')).find('#in_admin_location').val()!='from_yml'){
        if(sections_el.length > 0){
            sections = sections_el;
        }

        $('#SECTIONS_LINK_'+$(t).attr('data-id')).val(sections);
        $('.section_set[data-id='+$(t).attr('data-id')+']').addClass('active');
    }else{
        $('#SECTIONS_LINK_'+$(t).attr('data-id')).val('');
        $('.section_set[data-id='+$(t).attr('data-id')+']').removeClass('active');
    }

    $('.section_set[data-id='+$(t).attr('data-id')+']').val(sections);
    convertSectionIdToName();

    Dialog.Close();
    return false;
}

function convertSectionIdToName(){
    //arAllSections в yml_yakus_setup.php
    $(".section_set.active").each(function(){
        var id = parseInt($(this).val());
        if(id == 0) {
            $(this).val('...');
        }else {
            if (typeof arAllSections[id] != 'undefined') {
                $(this).val(arAllSections[id].NAME);
            }
        }
    })
}

$(function(){
    $("#tree").treeview({
        collapsed: true
    });
    //activeTreeChildsCheckbox('#tree'); //отмечаем галочки всех дочерних инпутов, при клике по родителю
    showTreeChecked('#tree'); //раскрываем ветку, если в ней есть отмеченный инпут
    convertSectionIdToName();


    $('#add_sku_prop').on('click', function(){
        $('#wrap_sku_props').append(html_template_sku_prop);
    })
    $('#add_link_prop').on('click', function(){
        $('#wrap_link_props').append(html_template_link_prop);
    })
    $('body').on('click', '.yml-btn-del-sku-prop', function(){
        $(this).parent().remove();
        if($('#wrap_sku_props .wrap_sku_prop').length==0){
            $('#wrap_sku_props').append(html_template_sku_prop);
        }
    })
    $('body').on('click', '.yml-btn-del-link-prop', function(){
        $(this).parent().remove();
        if($('#wrap_link_props .wrap_link_prop').length==0){
            $('#wrap_link_props').append(html_template_link_prop);
        }
    })

    $('.get_file_sections').on('click', function(){
        var t = this;
        $('#wrap_sections_tree').html('<br/><br/><br/>');
        stepAjax(
            {action: 'get_file_sections', profile_id: $('#PROFILE_ID').val()},
            function(){
                BX.showWait('wrap_sections_tree');
            },
            function (msg) {
                BX.closeWait('wrap_sections_tree');
                console.log(msg);
                $('#wrap_sections_tree').html(msg.DISPLAY);
                $('#tree').treeview({
                    collapsed: true
                });

                //activeTreeChildsCheckbox('#wrap_sections_tree'); //отмечаем галочки всех дочерних инпутов, при клике по родителю
                showTreeChecked('#wrap_sections_tree'); //раскрываем ветку, если в ней есть отмеченный инпут
                convertSectionIdToName();
            }
        );
    });

    $('body').on('click', '.section_set', function(){ //настройка привязок
        Dialog.ClearButtons();
        Dialog.SetButtons('<input type="submit" class="adm-btn-save" id="save_dialog" name="save_dialog" onclick="" value="'+MESS.btnSave+'"  data-parent="dialog"/>');
        Dialog.Show();
        $('#bx-admin-prefix .bx-core-adm-dialog-head-inner').html(MESS.dialogTitle);
        $('#dialog').html('');
        $('#save_dialog').attr('onclick', 'saveSectionLink(this)');
        $('#save_dialog').attr('data-id', $(this).attr('data-id'));
        stepAjax(
            {action: 'get_iblock_sections', profile_id: $('#PROFILE_ID').val(), sections_link: $('#SECTIONS_LINK_'+$(this).attr('data-id')).val()},
            function(){
                BX.showWait('dialog');
            },
            function(msg){
                BX.closeWait('dialog');
                $('#dialog').html(msg.DISPLAY);
                $('#tree_iblock_section_for_s').treeview({
                    collapsed: true
                });

                $('#tree_iblock_section_for_link').treeview({
                    collapsed: true
                });

                showTreeChecked('#tree_iblock_section_for_link'); //раскрываем ветку, если в ней есть отмеченный инпут
            }
        );
    })

    $('body').on('click', '#tree_iblock_section_for_link input[name="SECTIONS[]"]', function(){
        $('#tree_iblock_section_for_link input[name="SECTIONS[]"]').prop('checked', false);
        $(this).prop('checked', true);
    })









    function stepAjax(data, start, success){ //самозапускается до тех пор пока не получит в ответ FINISH
        start();
        $.ajax({
            url: '/bitrix/tools/yakus.yml2/ajax_functions.php',
            data: data,
            dataType: 'json',
            timeout: 40000,
            success: function(msg){
                success(msg);

                if(msg.RESULT != 'FINISH') {
                    setTimeout(function(){stepAjax(data, start, success);}, 1000);
                }else{

                }

            },
            error: function (msg) {
                console.log(msg.responseText)
            }

        })
    }

    function showTreeChecked(selector){//раскрываем ветку, если в ней есть отмеченный инпут
        $(selector+" input:checked").each(function() {
            $(this).parent('li').parents('li').each(function() {
                if($(this).hasClass('expandable')) {
                    $(this).children('.hitarea').click();
                }
            });
        });
    }

    /*
     function activeTreeChildsCheckbox(selector){ //отмечаем галочки всех дочерних инпутов, при клике по родителю
     //так мы проставляем галочки всем дочерним инпутам
     $(selector+' input[name="SECTIONS[]"]').change(function(){
     if($(this).prop('checked')) {
     $(this).parent().find('ul input').prop('checked', true);
     }else{
     $(this).parent().find('ul input').prop('checked', false);
     }
     })
     }
     */
})


/*
 function activeTreeParentsCheckbox(selector) { //так мы проставляем галочки всем родительским инпутам
 $(selector + ' input[name="SECTIONS[]"]').each(function () {
 if ($(this).prop('checked')) {
 $(this).parents('.collapsable').each(function () {
 $(this).find('input[name="SECTIONS[]"]:eq(0)').prop('checked', true)
 })
 }
 })
 }*/
