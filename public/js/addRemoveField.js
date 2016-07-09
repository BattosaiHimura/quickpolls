$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#lastOne"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            //$(wrapper).removeAttr("id");
            $(wrapper).append('<div class="form-group" ><label class="sr-only" for="argomento">Argomento</label><div class="classHolder"><input type="text" class="form-control" id="argomento'+ x +'" name="args[]" placeholder="Argomento" required /><a href="#" class="redLink remove_field">rimuovi</a></div></div>');

        };

    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
});