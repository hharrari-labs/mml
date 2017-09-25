$(document).ready(function(){
    generate_event_application();   


});


function generate_event_application(){
    destroy_event_application();
    generate_event();
    
    // Import produit
    $("#save-form-movie").click(function(){
        save_movie();
    });
    $("#file").click(function(){
        load_file();
    });
   
    
  
     

    
}

function destroy_event_application(){
    
    // Import produit
    $("#file").unbind();
    $("#js-import-product").unbind();
    $("#js-update-import-product").unbind();
    
 
    

}



function emprunt(elem) {
    if($(elem).is(':checked')){ 
    $("#cadre_loan").css('display','block');
    }
    else
    {$("#cadre_loan").css('display','none');}

}

function focus_loan()
{
    if($('#input-name').val()!="" || $('#input-firstname').val()!="" || $('#input-mail').val()!="") {
        $("#user_loan").attr("disabled","disabled");    /*rempli*/}
    else    {
        $('#user_loan').removeAttr('disabled');    /*vide*/}
}

function change_loan(elem)
{
    if($("#user_loan option:selected").val()!=0)    {
        $(".loan_in").attr("disabled","disabled");
        $(".loan_in").css("border","1px solid grey");
    }
    else
    {
         $(".loan_in").removeAttr("disabled");
        $(".loan_in").css("border","1px solid rgb(243, 238, 238)");
    }
}
function save_movie(){
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
                upload_file()
                $( "#js-dialog-form" ).dialog( "close" );          
            }
        }
    });
}
function load_file() {
     
    function createThumbnail(file,file_name) {
         
        var reader = new FileReader();
         
        reader.onload = function() {
             
            
            var imgElement = document.getElementById("img_upload");
//            prev.removeChild(imgElement);    
            imgElement.src = this.result;
            prev.appendChild(imgElement);
            
            var inputElement = document.getElementById("input-jacket");         
            inputElement.value = file_name;
            prev.appendChild(inputElement);
             
        };
         
        reader.readAsDataURL(file);
         
    }
     
    var allowedTypes = ['png', 'jpg', 'jpeg', 'gif', 'JPG'],
        fileInput = document.querySelector('#file'),
        prev = document.querySelector('#prev');
     
    fileInput.onchange = function() {
       
        var files = this.files,
            filesLen = files.length,
            imgType;
         var file_name = this.files[0].name;
         for (var i = 0 ; i < filesLen ; i++) {
             
            imgType = files[i].name.split('.');
            imgType = imgType[imgType.length - 1];
             
            if(allowedTypes.indexOf(imgType) != -1) {
                createThumbnail(files[i],file_name);
            }
             
        }
     
    };
//         $("#js-upload-button").click(function(){
//        upload_file(fileInput);
//    });
}

function upload_file(){

    var $path = remove_path() + $('#form').attr('action'),
    fileInput = document.querySelector('#file'),
    progress = document.querySelector('#progress');
 
    var xhr = new XMLHttpRequest();
 
    xhr.open('POST', $path);
 
    xhr.upload.onprogress = function(e) {
        progress.value = e.loaded;
        progress.max = e.total;
    };
     
    xhr.onload = function() {
        alert('Upload ok !');
    };
 
    var form = new FormData();
    form.append('file', fileInput.files[0]);
    xhr.send(form);
 

}



