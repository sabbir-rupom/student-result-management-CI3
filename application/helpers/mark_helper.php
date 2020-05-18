<?php

function checkGrade($mark) {

    switch ($mark) {
        case ($mark >= 0 && $mark <= 32):
            $grade = 'F';
            break;

        case ($mark >= 33 && $mark <= 39):
            $grade = 'D';
            break;

        case ($mark >= 40 && $mark <= 49):
            $grade = 'C';
            break;

        case ($mark >= 50 && $mark <= 59):
            $grade = 'B';
            break;

        case ($mark >= 60 && $mark <= 69):
            $grade = 'A-';
            break;

        case ($mark >= 70 && $mark <= 79):
            $grade = 'A';
            break;

        case ($mark >= 80 && $mark <= 100):
            $grade = 'A+';
            break;

        default:
            $grade = 'Invalid Mark';
            break;
    }

    return $grade;
}

function checkGradeAlpha($stu_cgpa) {

    switch ($stu_cgpa) {
        case ($stu_cgpa >= 0 && $stu_cgpa < 1):
            $grade_alpha = 'F';
            break;

        case ($stu_cgpa >= 1 && $stu_cgpa < 2):
            $grade_alpha = 'D';
            break;

        case ($stu_cgpa >= 2 && $stu_cgpa < 3):
            $grade_alpha = 'C';
            break;

        case ($stu_cgpa >= 3 && $stu_cgpa < 3.5):
            $grade_alpha = 'B';
            break;

        case ($stu_cgpa >= 3.5 && $stu_cgpa < 4):
            $grade_alpha = 'A-';
            break;

        case ($stu_cgpa >= 4 && $stu_cgpa < 5):
            $grade_alpha = 'A';
            break;

        case ($stu_cgpa == 5):
            $grade_alpha = 'A+';
            break;

        default:
            $grade_alpha = 'Invalid';
            break;
    }

    return $grade_alpha;
}

function checkGpa($mark) {
    if ($mark >= 0 && $mark <= 32) {
        $grade = '0';
    } elseif ($mark >= 33 && $mark <= 39) {
        $grade = '1';
    } elseif ($mark >= 40 && $mark <= 49) {
        $grade = '2';
    } elseif ($mark >= 50 && $mark <= 59) {
        $grade = '3';
    } elseif ($mark >= 60 && $mark <= 69) {
        $grade = '3.5';
    } elseif ($mark >= 70 && $mark <= 79) {
        $grade = '4';
    } elseif ($mark >= 80 && $mark <= 100) {
        $grade = '5';
    } else {
        $grade = 'Invalid Mark';
    }

    return $grade;
}

function checkCgpa($ban_Gpa, $en_Gpa, $mat_Gpa, $sci_Gpa, $ss_Gpa, $religion_Gpa) {
    $total_gpa = $ban_Gpa + $en_Gpa + $mat_Gpa + $sci_Gpa + $ss_Gpa + $religion_Gpa;
    $cgpa = $total_gpa / 6;
    return $cgpa;
}

function checkResult($ban_Gpa, $en_Gpa, $mat_Gpa, $sci_Gpa, $ss_Gpa, $religion_Gpa) {

    if ($ban_Gpa == 0 || $en_Gpa == 0 || $mat_Gpa == 0 || $sci_Gpa == 0 || $ss_Gpa == 0 || $religion_Gpa == 0) {
        $result = "Failed";
    } else {
        $result = "Passed";
    }

    return $result;
}

