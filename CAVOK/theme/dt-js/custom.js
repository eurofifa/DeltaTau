/*CUSTOM JS*/


function checkform(){
    $(":input").each(function() {
       if($(this).val() === ""){
        $('.warning').html('ALL FIELDS REUIRED! / MINDEN MEZŐ KITÖLTÉSE KÖTELEZŐ!');
        console.log("Empty Fields!!");
        event.preventDefault();
        }
    });
}