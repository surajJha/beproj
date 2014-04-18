$(document).ready(function()
{
    $("body").hide();
    $.ajax(
            {
                type: 'POST',
                url: '../../model/admin/manage_academic_year.php',
                cache: false,
                data: {field: "display"},
                success: function(data)
                {
                    if (data == "error" || data == '')
                    {
                        $("#acad_table").html("<div class='panel panel-info' style='width:75%'><div class='panel-heading'><h3><strong>Academic Year Records</strong></h3></div><div class='panel-body'><div style='padding:2%'><center>No previous year record found!</center></div></div></div><br><br>");
                    }
                    else
                    {
                        var flag = 0; // true for current and upcoming academic years(used to edit current and upcoming academic year date)
                        var t = "<div class='panel panel-info' style='width:75%'><div class='panel-heading'><h3><strong>Academic Year Record</strong></h3></div><div class='panel-body'><div class=\"table-responsive\"><table class=\"table table-striped\">";
                        t += "<thead><tr> <th>Academic Year</th> <th> Start Date </th> <th>End Date</th> </tr></thead>";
                        for (var i = 0; i < data.length; i++)
                        {

                            t += "<tr> <td>" + data[i].acad_year + " </td> <td>" + data[i].acad_start + " </td> <td>" + data[i].acad_end + "</td>";
                            if (data[i].flag_current == 1 || flag == 1)
                            {
                                flag = 1;
                                t += "<td><a href=\"#\" class=\"btn  btn-success edit\" data-toggle=\"modal\"  data-id=\" + data[i].acad_year + \" data-target=\"#edit\">Edit Date</a></td>";
                            }
                        }

                        t += "</table></div></div></div>";
                        //modal
                        t += "<div class=\"modal fade  \" id=\"edit\" role=\"dialog\"><div class=\"modal-dialog\"><div class=\"modal-content\">";
                        t += "<div class=\"modal-header\"><h4 align=\"center\">Change Acadmic Year Date</h4></div><div class=\"modal-body\"><div class=\"row\" ><div class=\"alert-success\" id=\"num_success_message\"></div><div class=\"alert-warning\" id=\"num_error_message\"></div></div>";
                        t += "<form class=\"form-horizontal\"  method=\"post\" id=\"edit_form\" >";
                        t += "<div class=\"modal-body\"><div class=\"form-group\"><label for=\"acad_yr\" class=\"col-lg-4 control-label\"> Academic year:</label><div class=\"col-lg-6\"><select  id=\"academic_year\"  class=\"form-control\"></select></div></div>";
                        t += "<div class=\"form-group\"><label for=\"s_date\" class=\"col-lg-4 control-label\"> Start Date:</label><div class=\"col-lg-6\"><input type = \"date\" id = \"start_date\" name = \"start_date\" class = \"form-control\" placeholder = \"YYYY-MM-DD\" / ></div></div>";
                        t += "<div class=\"form-group\"><label for=\"e_date\" class=\"col-lg-4 control-label\"> End Date:</label><div class=\"col-lg-6\"><input type = \"date\" id = \"end_date\" name = \"end_date\" class = \"form-control\" placeholder = \"YYYY-MM-DD\" / ></div></div>";
                        t += "<div class=\"modal-footer\"><button class=\"btn btn-primary\" type=\"submit\"  id=\"save_date\" >Save</button><a class=\"btn btn-danger\" id=\"date_close\"  data-dismiss=\"modal\">Close</a></div></div></form></div></div></div></div>";
                        $("#acad_table").html(t);


                        $(".edit").click(function() { // Click to only happen on announce links
                            $("#academic_year").val($(this).data('id'));
                            $('#edit').modal('show');
                        });

                        $("#edit").click(function() {

                        });
                    }
                }

            });
    $("#submit_acad_year").click(function() {
        var values = $("#acad_year_form").serialize();

        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/admin/manage_academic_year.php',
                    cache: false,
                    data: values,
                    success: function(data)
                    {

                        if (data == "Academic year updated succesfully!")
                        {

                            $("#success_message").html(data);
                        } else
                        {
                            $("#error_message").html(data);
                        }
                    }
                });
        return false;

    });
    $("body").delay(500).fadeIn(1000);
});
