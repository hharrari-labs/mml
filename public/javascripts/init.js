var menu_configuration = {
    sensitivity: 2,		// number = sensitivity threshold (must be 1 or higher)
    interval: 0, 			// number = milliseconds for onMouseOver polling interval
    over: show_menu,   // function = onMouseOver callback (REQUIRED)
    timeout: 10, 			// number = milliseconds delay before onMouseOut
    out: hide_menu 		// function = onMouseOut callback (REQUIRED)
};

var $delete_id = "";
var $delete_target = "";

$(document).ready(function(){
               
    if ($( "#js-dialog-form" ).size() > 0){
        dialog_form($('.ui-tabs-selected').children('a').text());
    }           
    if ($( "#js-dialog-show" ).size() > 0){
        dialog_show($('.ui-tabs-selected').children('a').text());
    }           
    if ($( "#js-dialog-delete" ).size() > 0){
        dialog_delete();
    }           
    if ($('.js-table-sorter').size() > 0){
        $('.js-table-sorter').each(function(){
            table_sorter($(this));
        });
    }

});

function generate_event(){
    open_dialog_delete_event();
    
    $(".js-menu").each(function(){
        $(this).hoverIntent(menu_configuration);
    });

    $('.js-form').each(function(){
        $(this).keyup(function(){
            check_form();
        });
        $(this).change(function(){
            check_form();
        });
        $(this).keydown(function(){
            check_form();
        });
    });
    
    $('.js-password').each(function(){
        $(this).focus(function(){
            $(this).select();
        });
        $(this).click(function(){
            $(this).select();
        });
    });
    
    $('.js-enter-login').each(function(){
        $(this).keyup(function(event){
            if(event.keyCode == '13'){
                send_login_form();
            }
        });
    });

$('.js-numeric').each(function(){
    $(this).keyup(function($event){
        is_numeric($event, $(this));
    });
    $(this).change(function($event){
        is_numeric($event, $(this));
    });
    $(this).keydown(function($event){
        is_numeric($event, $(this));
    });
});

$('.js-decimal').each(function(){
    $(this).keyup(function($event){
        is_decimal($event, $(this));
    });
    $(this).change(function($event){
        is_decimal($event, $(this));
    });
    $(this).keydown(function($event){
        is_decimal($event, $(this));
    });
});

$('.js-date').each(function(){
    $(this).datepicker({
        firstDay: 0,
        option: $.datepicker.regional[ $( this ).val() ]
    });
});

$('.js-delete').each(function() {
    $(this).click(function(){
        open_dialog_delete($(this));
    });
});

$('.js-update').each(function() {
    $(this).click(function(){
        open_dialog_edit($(this));
    });
});
    
$('.js-show').each(function(){
    $(this).click(function(){
        open_dialog_show($(this));
    });
});

$('.js-button').each(function(){
    $(this).hover( function() {
        $(this).addClass('ui-state-hover');
    }, function() {
        $(this).removeClass('ui-state-hover');
    } );
});

$("#save-form").click(function(){
    save();
});


$('.js-toggle').each(function() {
    $(this).click(function() {
        toggle_block($(this));
    });
});

$('.js-over').each(function() {
    $(this).hover( function() {
        $(this).addClass('is-over');
    }, function() {
        $(this).removeClass('is-over');
    } );
});

$("#submit-login").click(function(){
    send_login_form();
});
        
$('#js-new').click(function(){
    open_dialog_new();
});
 
}

function open_dialog_delete_event(){

    $('.js-menu').unbind();
    
    $('.js-form').unbind();
    
    $('.js-enter-login').unbind();
    
    $('.js-numeric').unbind();
    
    $('.js-decimal').unbind();
    
    $('.js-date').unbind().removeClass('hasDatepicker');
    
    $('.js-delete').unbind();

    $('.js-update').unbind();

    $('.js-show').unbind();

    $('.js-button').unbind();

    $("#save-form").unbind();
    
    $("#save-form-movie").unbind();
    
    $("#save-form-with-upload").unbind();

    $('.js-toggle').unbind();

    $('.js-over').unbind();

    $('#js-new').unbind();

    $("#Btn_Antispam").unbind();
    
    $("#submit-login").unbind();
}

function check_email($email){ // verif validite email par REGEXP
    var reg = /^[a-z0-9._-]+@[a-z0-9.-]{2,}[.][a-z]{2,3}$/
    return (reg.exec($email))
}

function check_password($password){ // vï¿½rif validitï¿½ mdp par REGEXP
    var reg = /^[0-9a-zA-Z]{4,}$/
    return (reg.exec($password))
}

function show_button(){
    $('#form-button').removeClass('hidden');
    $('#save-form-with-upload').removeClass('hidden');
}

function hide_button(){
    $('#form-button').addClass('hidden');
    $('#save-form-with-upload').addClass('hidden');
}

function remove_path(){
    var $controller = location.pathname.split('/');
    var $path = "";
    for (var $i=1;$i<$controller.length ;$i = $i+1){
        $path = $path+"../"; 
    }
    return $path;
}

function get_id($identifiant){
    var $tab_id = '';
    if($identifiant != ''){
        $tab_id = $identifiant.split('-');
    }else{
        $tab_id = '0';
    }
    if($tab_id.length >1){
        $tab_id.splice(0, 1);
        $identifiant = $tab_id[$tab_id.length - 1];
    }
    return $identifiant;
}

function get_id_form_field($identifiant){
    return $identifiant.replace("input-", "");
}

function get_action($action){
    var $actions = '';
    if($action != ''){
        $actions = $action.split('/');
    }else{
        $actions = '0';
    }
    if($actions.length >1){
        $actions.splice(0, 1);
        $action = $actions[$actions.length - 1];
        if ($action != "create") {
            $action = $actions[$actions.length - 2];
        }
    }
    return $action;
}

function get_path(){
    return $("#js-path").html();
}

function show_menu(){
    $(this).children('.content-submenu').removeClass('hidden');
}

function hide_menu(){
    $(this).children('.content-submenu').addClass('hidden');
}

function is_decimal($event, $this){  
    var reg = /^(\d)*\.?(\d*)$/;
    var $return = "";
    var $val = $this.val();
    var $i = 0;
    var $error = false;
    
    if ($event.keyCode != "37" && $event.keyCode != "39" && $event.keyCode != "38" && $event.keyCode != "40"){
        for ($i = 0; $i < $val.length; $i++) {
            if (reg.exec($val.substr($i, 1))){
                $return = $return + $val.substr($i, 1)
            }else{
                $error = true;
            }
        }
    }else{
        $return = $val;
    }
    
    if($error == false){
        $this.removeClass('input-error');
    }else{
        $this.addClass('input-error');
    }
    
    $this.val($return);
    
}

function is_numeric($event, $this){
    
    var reg = /^[0-9]*$/;
    var $return = "";
    var $val = $this.val();
    var $i = 0;
    var $error = false;
    
    if ($event.keyCode != "37" && $event.keyCode != "39" && $event.keyCode != "38" && $event.keyCode != "40"){
        for ($i = 0; $i < $val.length; $i++) {
            if (reg.exec($val.substr($i, 1))){
                $return = $return + $val.substr($i, 1)
            }else{
                $error = true;
            }
        }
    }else{
        $return = $val;
    }
    
    if($error == false){
        $this.removeClass('input-error');
    }else{
        $this.addClass('input-error');
    }
    
    $this.val($return);
    
}

function toggle_block($this){
    var $target=$this.parent().next();
    if($this.hasClass("toggle-close")){
        $this.removeClass('toggle-close').addClass('toggle-open');
    }else{
        $this.removeClass('toggle-open').addClass('toggle-close');
    }
    $target.toggle();
}

function send_login_form(){
    if($("#login-email").val()!="" && check_email($("#login-email").val()) != null && $("#login-password").val()!="" && check_password($("#login-password").val()) != null){
        $("#login-form").submit();
    }else{
        $("#error-login").removeClass('hidden');
    }
}

function table_sorter($this){
    $('#waiting').hide();
    $('#waiting').addClass('hidden');
    var $table = $this.dataTable({
        "fnDrawCallback": function() {
            generate_event_application();
        },        
        "bAutoWidth": false,
        "iDisplayLength": 25,
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "aLengthMenu": [[25, 90, -1], [25, 90, "All"]],
        "aoColumnDefs": [ {
            "bSortable": false, 
            "aTargets": [ 0 ]
        }],
        "bStateSave": true,
        "oLanguage": {
            "sZeroRecords": $("#js-table-no-data").html()
        }
    });
    $this.show(); 
    $('#waiting').removeClass('hidden');  
    return $table;
}

function dialog_form($title){
    $( "#js-dialog-form" ).dialog({
        autoOpen: false,
        width: 870,
        title: $title,
        modal: true,
        resizable: false,
        close: function() {
            $("#js-dialog-form").html('');
        }
    });
}

function open_dialog_edit($this){
    var $id= get_id($this.parents(".line").attr('id'));
    var $path = remove_path() + get_path() + "edit/" +$id;
    $("#js-dialog-form").load($path, function(){
        generate_event_application();
        hide_button();
        $( "#js-dialog-form" ).dialog( "open" );
    });
}

function open_dialog_new(){
    var $path = remove_path() + get_path() + "new";
    $("#js-dialog-form").load($path, function(){
        generate_event_application();
        hide_button();
        $( "#js-dialog-form" ).dialog( "open" );
    });

}

function dialog_show($title){
    $( "#js-dialog-show" ).dialog({
        autoOpen: false,
        width: 1125,
        title: $title,
        modal: true,
        resizable: false,
        close: function() {
            $("#js-dialog-show").html('');
        }
    });
}

function open_dialog_show($this){
    var $id= get_id($this.parents(".line").attr('id'));
    var $path = remove_path() + get_path() + "show/" +$id;
    $("#js-dialog-show").load($path, function(){
        generate_event_application();
        hide_button();
        $( "#js-dialog-show" ).dialog( "open" );
    });
}

function dialog_delete(){
    var $path = remove_path() + get_path();
       
    $( "#js-dialog-delete" ).dialog({
        autoOpen: false,
        height: 150,
        width: 550,
        title: 'DELETE',
        modal: true,
        resizable: false,
        dialogClass: "dialog-delete",
        buttons: {
            No: function() {
                $( this ).dialog( "close" );
            },
            Yes: function() {
                $.ajax({
                    type: "POST",
                    url: $path+"destroy/"+$delete_id,
                    complete : function(){
                        $delete_target.remove();
                        $delete_id="";
                        $delete_target="";
                        $("#js-dialog-delete").dialog( "close" );
                    }
                });
            }
        }
    });
}

function open_dialog_delete($this){
    $delete_target = $this.parents(".line");
    $delete_id= get_id($delete_target.attr('id'));
    var $message_delete=$('#js-message-delete').text();
    $message_delete=$message_delete.replace("||action||", $this.children('span').attr('title'));
    var $attribut= $message_delete.split('||');
    for(var $i=1;$i<$attribut.length;$i=$i+2){
        $message_delete=$message_delete.replace("||"+$attribut[$i]+"||",$delete_target.find('.'+$attribut[$i]).html());
    }
    $( "#js-dialog-delete" ).html($message_delete);
    $( "#js-dialog-delete" ).dialog( "open" );
}

function save(){
    var $path = remove_path() + $('#form').attr('action');
    var $error = false;
    var $action = get_action($('#form').attr('action'));
    var $fields = get_fields_form()
    var $line = $('#line-'+$fields['id']);
    var $target = "";;
    hide_button();
    
    $.ajax({
        type: "POST",
        url: $path,
        data: $("#form").serialize(),

        complete: function(){
            if($error==false && $action=="create"){
                location.reload();
            }else if($error==false && $action=="update"){
                for (var $key in $fields) {
                    $target = $line.find('.'+$key);
                    $target.html($fields[$key]);
                    if($target.hasClass('js-icon-check')){
                        if($fields[$key] == '1'){
                            $target.addClass('is-checked');
                        }else{
                            $target.removeClass('is-checked');
                        }
                    }
                }
                $( "#js-dialog-form" ).dialog( "close" );
            }
        }
    });
}

function get_fields_form() {
    var $key = "";
    var $val = "";
    var $fields = new Array();
    $fields['id'] = $("#input-id").val();
    $('.js-show-view').each(function(){
        $key = get_id_form_field($(this).attr('id'));
        if($(this).is("select")){
            if($(this).val()==""){
                $val = "";
            }else{
                $val = $(this).find(':selected').text();
            }
        }else if($(this).is("radio")){
            if($(this).find(':selected').val()==""){
                $val = "";
            }else{
                $val = $(this).find(':selected').text();
            }
        }else if($(this).hasClass("js-checkbox")){
            if($(this).is(':checked')){
                $val = "1";
            }else{
                $val = '0';
            }
        }else if($(this).hasClass("js-numeric") || $(this).hasClass("js-decimal")){
            if($(this).val()==""){
                $val = "0";
            }else{
                $val = $(this).val();
            }
        }else{
            if($(this).val()==""){
                $val = "";
            }else{
                $val = $(this).val();
            }
        } 
        $fields[$key] = $val;
    });
        
    return $fields;
    
    
}

function check_form(){
    var $error = false;
    var $field_id = "";
    
    $('.js-form').removeClass('input-error');
    
    $('.content-error-form').each(function(){
        $(this).addClass('hidden');
        $(this).find('.error-form').addClass('hidden');
    });
    
    $('.js-mandatory').each(function(){
        $field_id = get_id_form_field($(this).attr('id'));
        if($(this).val() == "") { // Test si le champs n'est pas vide
            $("#error-not-null-"+$field_id).removeClass('hidden');
            $("#error-not-null-"+$field_id).parents('.content-error-form').removeClass('hidden');
            $(this).addClass('input-error');
            $error = true;
        } else if($(this).hasClass('js-email') && check_email($(this).val()) == null){ // Test si le champs est un email + erreur
            $("#error-email-"+$field_id).removeClass('hidden');
            $("#error-email-"+$field_id).parents('.content-error-form').removeClass('hidden');
            $(this).addClass('input-error');
            $error = true;
        }else if($(this).hasClass('js-password') && check_password($(this).val()) == null){
            $("#error-password-"+$field_id).removeClass('hidden');
            $("#error-password-"+$field_id).parents('.content-error-form').removeClass('hidden');
            $(this).addClass('input-error');
            $error = true;
        }
    });
    
    if ($error==false){
        show_button();
    } else {
        hide_button();
    }
}

