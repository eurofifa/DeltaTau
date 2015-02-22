 window.onload = function() {
        CKEDITOR.replace( 'mail_editor', {
            toolbar: 'Basic'
    
        } );
    };

$(document).ready(function() {   
          
       /* $(".sbm").easyconfirm();*/
    $('.confirm_me').submit(function(){
        
        event.preventDefault();
        
        $("#dialog-confirm").dialog({
           resizable: false,
           height:200,
           modal: true,
           buttons: {
               'Confirm': function() {
                   $(this).dialog('close');
                   $('#content form').submit();
               },
               Cancel: function() {
                   $(this).dialog('close');
               }
           }
       });
        
        
    });    
   
    
    
    
    $('.dynamic table').dataTable( {
        "sDom": 'T<"clear">lfrtip',
        "oTableTools": {
            "sSwfPath": "public/swf/copy_csv_xls_pdf.swf"},
        "aaSorting": [[ 4, "desc" ]],
        "sPaginationType": "full_numbers"
    } );
   
    var errc = 0;
    var cought = 0;
    
    /*$('.sbm').click(function(){
        
        $(".log input").each(function() {
        if($(this).val() === "")
            event.preventDefault();
            cought++;
        });
        
        if(cought > 0){ $('<div class="error">All fields are required!</div>').insertBefore('.tbl'); }
        
        
        
    });*/
    
    
    
    $("#hobbsout").keyup(function(){
        
        var a = $(this).val();
        var b = $("#hobbsin").val();
        
        if(errc == 0 && a <= b){ 
            
            $('<div class="error">Check Hobbs out!</div>').insertBefore('.tbl');
            $(this).css('background-color', 'red');
            $(this).css('color', 'white');
            errc++;
    
        }else if(a > b){ 
            $(this).css('background-color', 'white');
            $(this).css('color', 'black');
        }
        
        
        
    });
    
    var ercc = 0;
    
    $("#tachout").keyup(function(){
        
        var c = $(this).val();
        var d = $("#tachoin").val();
        
        if(ercc == 0 && c <= d){ 
            
            $('<div class="error">Check Tacho out!</div>').insertBefore('.tbl');
            $(this).css('background-color', 'red');
            $(this).css('color', 'white');
            ercc++;
    
        }else if(c > d){ 
            $(this).css('background-color', 'white');
            $(this).css('color', 'black');
        }
        
        
        
    });
    
   
    
    
    
    $( ".date" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $(".phone").mask("+99/99-999-9999");
    $(".hobbs").mask("9999.99");
    $(".tacho").mask("9999.99");
    $('.landing').spinner({
            min: 1,
            max: 100,
            step: 1
        });
    
    
} );
