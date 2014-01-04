//on change should populate the subject select    
function muFunction()
{


    alert("woot !");
        
    $.getJSON("../model/options/subject.php",{
        subject: $(this).val(), 
        ajax: 'true'
    }, function(j){
        var options = '';
        for (var i = 0; i < j.length; i++) {
            options += '<option value="' + j[i]+ '">' + j[i] + '</option>';
        }
        $("select#subject").html(options);
    })

}


