<?php

$t = $_POST['tab'];

if ($t === "1") {
    assignClassTeacher();
} elseif ($t === "2") {
    assignSubjectTeacher();
} elseif ($t === "3") {
    assignStudents();
} elseif ($t === "4") {
    addClass();
}

function assignClassTeacher() {

    require_once '../database.php';

    $query = "SELECT * FROM academic_year";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $acad_start = $row['acad_start'];
    $acad_end = $row['acad_end'];

    $name = explode(" ", $_POST['ct_teacher']);

    $query = "SELECT user_id FROM user WHERE fname='{$name[0]}' and lname='{$name[1]}'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];

    $query = "INSERT into is_class_teacher (`user_id`, `standard`, `division`, `acad_start`, `acad_end`) 
        values('{$user_id}','{$_POST['ct_standard']}','{$_POST['ct_division']}','{$acad_start}','{$acad_end}')";

    if (mysqli_query($connection, $query)) {
        echo "Class teacher has been assigned successfully!";
    } else {
        echo "THE ERROR IS" . mysqli_error($connection);
    }
}

function assignSubjectTeacher() {

    require_once '../database.php';

    $query = "SELECT * FROM academic_year";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $acad_start = $row['acad_start'];
    $acad_end = $row['acad_end'];

    $name = explode(" ", $_POST['st_teacher']);

    $query = "SELECT user_id FROM user WHERE fname='{$name[0]}' and lname='{$name[1]}'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];

    $query = "INSERT into teaches_class_subject (`user_id`, `subject_name`, `standard`, `division`, `acad_start`, `acad_end`) 
        values('{$user_id}','{$_POST['st_subject']}','{$_POST['st_standard']}','{$_POST['st_division']}','{$acad_start}','{$acad_end}')";

    if (mysqli_query($connection, $query)) {
        echo "Subject teacher has been assigned successfully!";
    } else {
        echo "THE ERROR IS" . mysqli_error($connection);
    }
}

function assignStudents() {
    require_once '../database.php';

    $query = "SELECT * FROM academic_year";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $acad_start = $row['acad_start'];
    $acad_end = $row['acad_end'];

    $user_id = preg_split("/[\s,]+/", $_POST['students']);

    $flag = 0;
    for ($i = 0; $i < sizeof($user_id); $i++) {
        $query = "SELECT * FROM user WHERE user_id='{$user_id[$i]}' and type='0'";
        if (mysqli_query($connection, $query)) {

            $query = "INSERT into student_belongs_to (`user_id`, `standard`, `division`, `acad_start`, `acad_end`) values('{$user_id[$i]}','{$_POST['s_standard']}','{$_POST['s_division']}','{$acad_start}','{$acad_end}')";

            if (mysqli_query($connection, $query)) {
                continue;
            } else {
                $message = "THE ERROR IS" . mysqli_error($connection);
                $flag = 1;
                break;
            }
        }
    }
    if ($flag == 0) {
        echo 'Students have been assigned successfully!';
    } else {
        echo $message;
    }
}

function addClass() {
    require_once '../database.php';

    $query = "INSERT into class (`standard`, `division`) values ('{$_POST['set_standard']}','{$_POST['set_division']}')";

    if (mysqli_query($connection, $query)) {
        echo "Class has been inserted successfully!";
    } else {
        echo "THE ERROR IS" . mysqli_error($connection);
    }
}

?>
