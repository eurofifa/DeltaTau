function round(value, exp) {
  if (typeof exp === 'undefined' || +exp === 0)
    return Math.round(value);

  value = +value;
  exp  = +exp;

  if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0))
    return NaN;

  // Shift
  value = value.toString().split('e');
  value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp)));

  // Shift back
  value = value.toString().split('e');
  return +(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp));
}

$(document).ready(function(){    
    $('input').focus(function(){
        /*$('.ac-mask1').mask('9999.99');
        $('.ac-mask2').mask('9999.9');
        $('.ac-mask3').mask('999.9');
        $('.ac-mask4').mask('999.99');*/

        $('.icao-mask').mask('aaaa');
        $('.time-mask').mask('99:99'); 
    });
    var remmask = false;
    $('.ac-mask1, .ac-mask2, .ac-mask3, .ac-mask4').focus(function(){
        var value = $(document.activeElement).val();
        var origin = value.length;
        if(origin < 7 || remmask === true){ 
            /*DO NOTHING*/
        }else{ 
                console.log('mask1');
                $(this).mask('9999.99');
        }
        
        $(this).bind('keypress', function(e) {
                if(e.keyCode === 81){
                    $(this).unmask();
                    if(remmask === false){ 
                        remmask = true;
                    }else{
                        remmask = false;
                    }
                }
        });
        
        
    });
    
    $('#engine_in, #engine_out').focus(function(){ 
        var a = parseFloat($("#engine_in").val()); 
        var b = parseFloat($("#engine_out").val());
        var res = b - a;
        res = round(res, 2);
        $('#engine_time').val(res);
    });
    $('#engine_in, #engine_out').blur(function(){ 
        var a = parseFloat($("#engine_in").val()); 
        var b = parseFloat($("#engine_out").val());
        var res = b - a;
        res = round(res, 2);
        
        $('#engine_time').val(res);
    });
    
    $('#hobbs_in, #hobbs_out').focus(function(){ 
        var a = parseFloat($("#hobbs_in").val()); 
        var b = parseFloat($("#hobbs_out").val());
        var res = b - a;
        res = round(res, 2);
        $('#total_time').val(res);
    });
    
    $('#hobbs_in, #hobbs_out').blur(function(){ 
        var a = parseFloat($("#hobbs_in").val()); 
        var b = parseFloat($("#hobbs_out").val());
        var res = b - a;
        res = round(res, 2);
        $('#total_time').val(res);
    });
    
    
    
    
 });