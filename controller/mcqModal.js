/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
       
             /*   $(document).ready(function() {

                    $("#submit_mcqModal").click(function(event) {
                          event.preventDefault();
                        var values = $("#mcqModalForm").serialize();
                        alert(values);
                        $.ajax(
                                {
                                    type: 'GET',
                                    url: '../model/mcqModal.php',
                                    data: values, //your form datas to post          
                                    success: function(response)
                                    {
                                        alert(response);

                                    },
                                    error: function()
                                    {
                                        alert("Failure");
                                    }
                                });
                    });
                });   */
              /* function process(){
                    var values = $("#mcqModalForm").serialize();
                     // event.preventDefault();
                                      
                         //alert(values);
                        $.ajax(
                                {
                                    type: 'GET',
                                    url: '../model/mcqModal.php',
                                    data: values, //your form datas to post          
                                    success: function(response)
                                    {
                                        alert(response);

                                    },
                                    error: function()
                                    {
                                        alert("Failure");
                                    }
                                });               

                }  */
                $(document).ready(function(){
                     $("button#submit_mcqModal").click(function(evt){
                   evt.preventDefault();
                    var values = $("#mcqModalForm").serialize();
                    $.ajax(
                                {
                                    type: 'GET',
                                    url: '../model/mcqModal.php',
                                    data: values, //your form datas to post          
                                    success: function(response)
                                    {
                                        alert(response);

                                    },
                                    error: function()
                                    {
                                        alert("Failure");
                                    }
                                });          
                });

                    
                });
               









    
