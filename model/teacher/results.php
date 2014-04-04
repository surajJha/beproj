<?php

header('Content-Type: application/json');

session_start();

$f = $_GET['f'];

if ($f == "s2")
{
    populateS2();
}
if ($f == "test_codes")
{
    populateTestCodes();
}
if ($f == "student")
{
    populateStudent();
}
if ($f == "subject")
{
    populateSubject();
}

if ($f == "cc")
{
    classChart();
}

if ($f == "tc")
{
    testChart();
}

if ($f == "sc")
{
    studentChart();
}

if ($f == "subc")
{
    subjectChart();
}

if ($f == "subn")
{
    subjectNegative();
}

$field = $_GET['f'];

if ($field == "t")
{
    test_summary();
}
if ($field == "q")
{
    question_details();
}
if ($field == "s")
{
    student_ranks();
}
if ($field == "c1")
{
    chart1();
}
if ($field == "c2")
{
    chart2();
}

function test_summary()
{
    require_once '../database.php';

    $query = "select * from test as t where t.test_id='{$_GET['test_id']}'";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }
}

function question_details()
{
    require_once '../database.php';

    $query = "SELECT q.question_id,q.question_desc,q.answer,q.topic_name,q.type FROM question AS q, test_has_question as t WHERE t.question_id=q.question_id and t.test_id='{$_GET['test_id']}'";

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

function student_ranks()
{
    require_once '../database.php';

    $x = array();
    /* @var $query type */
    $query = "select s.user_id,u.fname,u.lname, round(s.marks_obtained/s.total_marks*100) as p from student_gives_test as s, user as u where s.test_id='{$_GET['test_id']}' and s.user_id=u.user_id order by p desc";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }


        echo json_encode($x);
    }
}

function chart1()
{
    require_once '../database.php';

    $x = array();

    $query = "select count(*) as na from student_belongs_to as c, test as t where t.test_id='{$_GET['test_id']}' and c.standard=t.standard and c.division=t.division and c.user_id not in (select s.user_id from student_gives_test as s where t.test_id=s.test_id )";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $row = mysqli_fetch_assoc($result);
        array_push($x, $row);
    }

    $query = "select count(*) as pass from student_belongs_to as c, test as t where t.test_id='{$_GET['test_id']}' and c.standard=t.standard and c.division=t.division and c.user_id in (select s.user_id from student_gives_test as s where t.test_id=s.test_id and round(s.marks_obtained/s.total_marks*100)>=40 )";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $row = mysqli_fetch_assoc($result);
        array_push($x, $row);
    }

    $query = "select count(*) as fail from student_belongs_to as c, test as t where t.test_id='{$_GET['test_id']}' and c.standard=t.standard and c.division=t.division and c.user_id not in (select s.user_id from student_gives_test as s where t.test_id=s.test_id and round(s.marks_obtained/s.total_marks*100)>=40 )";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $row = mysqli_fetch_assoc($result);
        array_push($x, $row);
    }

    echo json_encode($x);
}

function chart2()
{
    /* we need code here to extract every question in the test 
     * 
     * then i want the question wise data for - how many no of students who answered correctly, incorrectly or did not answer
     * 
     * but this has to be question wise ! ;)done
     * 
     * 
     */

    require_once '../database.php';

    $query = "SELECT question_id,  response, answer FROM response WHERE test_id ={$_GET['test_id']}";
    $result = mysqli_query($connection, $query);

    $x = array();

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }

        echo json_encode($x);
    }
}

function populateS2()
{
    require_once("../database.php");

    $x = array();

    $query = "select concat(t.standard,'-',t.division) as c from teaches_class_subject as t, academic_year as a
where t.user_id='{$_SESSION['user_id']}' and t.acad_year=a.acad_year and a.flag_current=1";

    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row['c']);
        }

        echo json_encode($x);
    }
}

function populateTestCodes()
{
    require_once("../database.php");
    $d = date("Y-m-d");
    $x = array();

    $query = "select t.test_id from test as t, academic_year as a
where t.user_id='{$_SESSION['user_id']}' and t.date<'{$d}' and t.date >=a.acad_start and t.date<=a.acad_end and a.flag_current=1";

    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row['test_id']);
        }

        echo json_encode($x);
    }
}

function populateStudent()
{
    require_once("../database.php");

    $x = array();

    $query = "select concat(u.fname,' ',u.lname,' - ',u.user_id) as s from user as u, student_belongs_to as s, academic_year as a
where s.standard='{$_GET['std']}' and s.division='{$_GET['div']}' and a.acad_year=s.acad_year and u.user_id=s.user_id and
a.flag_current=1";

    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row['s']);
        }

        echo json_encode($x);
    }
}

function populateSubject()
{

    require_once("../database.php");

    $x = array();

    $query = "select t.subject_name as s from teaches_class_subject as t,academic_year as a
where t.user_id='{$_SESSION['user_id']}' and t.standard='{$_GET['std']}' and t.division='{$_GET['div']}' and t.acad_year=a.acad_year and a.flag_current=1";

    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row['s']);
        }

        echo json_encode($x);
    }
}

function classChart()
{
    require_once '../database.php';

    $query = "select u.fname, u.lname, t.subject_name, sum(g.marks_obtained) as marks_obtained, sum(g.total_marks) as total_marks
        from student_belongs_to as b, user as u, student_gives_test as g, test as t 
        where b.user_id= u.user_id and b.user_id= g.user_id and  g.test_id = t.test_id 
        and b.standard='{$_GET['std']}' and b.division= '{$_GET['div']}' group by u.fname,u.lname,t.subject_name";

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

function testChart()
{
    
}

function studentChart()
{
    require_once '../database.php';

    $query = "select t.test_name,g.marks_obtained, g.total_marks, t.subject_name,t.date,t.test_id from test as t, student_gives_test as g, academic_year as a"
            . " where  g.user_id='{$_GET['user_id']}' and g.test_id= t.test_id  and acad_start<t.date and  t.date<a.acad_end and a.flag_current=1";
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

function subjectChart()
{
    require_once '../database.php';

    $query = "select u.user_id,u.fname,u.lname,t.test_name, g.marks_obtained,g.total_marks, round((g.marks_obtained/ g. total_marks)*100,2) as percent
      from student_belongs_to as b, user as u, student_gives_test as g, test as t
      where b.user_id= u.user_id and b.user_id= g.user_id and  g.test_id = t.test_id and t.standard=b.standard and t.division=b.division
      and b.standard='{$_GET['std']}' and b.division='{$_GET['div']}' and t.subject_name='{$_GET['subject']}' order by percent desc";
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

    /*
      include '../database.php';
      $x = array();
      $x1 = array();
      $query = "select b.user_id, u.fname, u.lname, (sum(marks_obtained)/sum(total_marks)*100) as percent from user as u, student_gives_test as g,test as t,academic_year as a,student_belongs_to as b where a.acad_start< t.date and t.date<a.acad_end and a.flag_current=1 and t.test_id= g.test_id and g.user_id= b.user_id and b.standard= '10' and b.division = 'A' and u.user_id=b.user_id group by b.user_id, u.fname, u.lname";
      $result = mysqli_query($connection, $query);
      if ($result)
      {

      while ($row = mysqli_fetch_assoc($result))
      {
      array_push($x1, $row);
      }
      }

      $x2 = array();
      $query = "select b.user_id,test_name, (sum(marks_obtained)/sum(total_marks)*100) as percent from user as u, student_gives_test as g,test as t,academic_year as a,student_belongs_to as b where a.acad_start< t.date and t.date<a.acad_end and a.flag_current=1 and t.test_id= g.test_id and g.user_id= b.user_id and b.standard= '10' and b.division = 'A' and u.user_id=b.user_id group by b.user_id, t.test_name";
      $result = mysqli_query($connection, $query);
      if ($result)
      {

      while ($row = mysqli_fetch_assoc($result))
      {
      array_push($x2, $row);
      }
      }

      $x[] = $x1;
      $x[] = $x2;
      echo json_encode($x);
     * 
     */
}

function subjectNegative()
{
    require_once '../database.php';

    $query = "select r.topic_name,count(*) as c from response as r  
            where r.response!=r.answer and r.subject_name='{$_GET['subject']}' and r.standard='{$_GET['std']}' and r.division='{$_GET['div']}'
            group by r.topic_name";
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
