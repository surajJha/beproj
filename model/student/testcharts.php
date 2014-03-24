<?php

header('Content-Type: application/json');
session_start();
$field = $_GET['f'];
if ($field == 'c1')
{
    f1();
}
//Line chart for student annual performance
if ($field == 'c2')
{
    f2();
}
if ($field == 'c3'|| $field== 'c4')
{
    f3_f4();
}
if($field == 'c5')
{
    f5();
}


function f1()
{
    require_once '../database.php';

    $query = "select round((s.marks_obtained/s.total_marks)*100) as percent,t.test_name,t.subject_name from student_gives_test as s, test as t, academic_year as a
    where s.test_id=t.test_id and s.user_id=\"4029\" and t.date >=a.acad_start and t.date <a.acad_end and a.flag_current=1 ";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $x = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }
        echo json_encode($x);
    }
}

function f()
{
    require_once '../database.php';

    $query = "SELECT q.question_id,q.question_desc,r.response,q.answer,q.topic_name,q.type
FROM response AS r, student_gives_test AS s, question AS q
WHERE r.response_id = s.response_id
AND s.user_id =  '{$_SESSION['user_id']}'
AND r.test_id =  '{$_GET['test_id']}'
and r.question_id=q.question_id";

    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $x = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            if ($row['type'] == "Mcq")
            {

                $query = "SELECT `optionA`, `optionB`, `optionC`, `optionD` FROM `mcq` WHERE `question_id`='{$row['question_id']}'";
                $result_temp = mysqli_query($connection, $query);

                if ($result_temp)
                {
                    $row_temp = mysqli_fetch_assoc($result_temp);
                    $row['mcq']['optionA'] = $row_temp['optionA'];
                    $row['mcq']['optionB'] = $row_temp['optionB'];
                    $row['mcq']['optionC'] = $row_temp['optionC'];
                    $row['mcq']['optionD'] = $row_temp['optionD'];
                }

                array_push($x, $row);
            }
        }

        echo json_encode($x);
    }
}

//Line chart for student annual performance
function f2()
{
    require_once '../database.php';

    $query = "select t.test_name,g.marks_obtained, g.total_marks, t.subject_name,t.date,t.test_id from test as t, student_gives_test as g, academic_year as a where  g.user_id=\"4020\" and g.test_id= t.test_id  and acad_start<t.date and  t.date<a.acad_end and a.flag_current=1";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $x = array();

        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }
        echo json_encode($x);
    }
}

function f3_f4()
{
    require_once '../database.php';

    $query = "select u.user_id,u.fname,u.lname,t.test_name, g.marks_obtained,g.total_marks, round((g.marks_obtained/ g. total_marks)*100,2) as percent  
        from student_belongs_to as b, user as u, student_gives_test as g, test as t 
        where b.user_id= u.user_id and b.user_id= g.user_id and  g.test_id = t.test_id 
        and b.standard= 10 and b.division= 'A' and t.subject_name= 'Math' order by percent desc";
    $result = mysqli_query($connection, $query);
    if ($result)
    {
        $x = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }
        /* echo "<prev";
          var_dump($x);
          echo "</prev>"; */
        echo json_encode($x);
    }
}


function f5()
{
    require_once '../database.php';

    $query = "select u.fname,u.lname,t.subject_name, g.marks_obtained,g.total_marks  
        from student_belongs_to as b, user as u, student_gives_test as g, test as t 
        where b.user_id= u.user_id and b.user_id= g.user_id and  g.test_id = t.test_id 
        and b.standard= 10 and b.division= 'A' and t.test_name='Unit test 1'";
    $result = mysqli_query($connection, $query);
    if ($result)
    {
        $x = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }
        /* echo "<prev";
          var_dump($x);
          echo "</prev>"; */
        echo json_encode($x);
    }
}
