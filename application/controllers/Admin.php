<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Admin Controller
 *
 * @property Admin_Model $ma
 * @property CI_Session $session
 *
 */
class Admin extends CI_Controller {

    /**
     * Process admin sign IN if form submitted
     */
    public function index() {
        if ($this->input->post('email')) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('pass', 'Password', 'required');

            if ($this->form_validation->run() === true) {
                $email = $this->input->post('email', true);
                $pass = $this->input->post('pass', true);
                $adminInfo = $this->ma->signIn($email, $pass);
                if (!empty($adminInfo)) {
                    $this->session->set_userdata('name', $adminInfo->name);
                    redirect('admin/dashboard');
                }
            } else {
                $this->session->set_flashdata('error', 'Please, fill the form properly!');
            }
        }

        $this->signIn();
    }

    /**
     * Show admin sign-in form
     */
    public function signIn() {
        $this->load->view('admin/login');
    }

    /**
     * Show admin sign-up form
     */
    public function signUp() {
        $this->load->view('admin/signup');
    }

    /**
     * Process admin sign up
     */
    public function processSignUp() {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Please, fill the form properly!');
            $this->signUp();
        } else {
            $name = $this->input->post('name', true);
            $email = $this->input->post('email', true);
            $pass = $this->input->post('pass', true);
            $adminId = $this->ma->insertAdminData($name, $email, $pass);

            if ($adminId) {
                $this->session->set_flashdata('success', 'Congatulations! you can sign in now!');
                redirect('admin/login');
            } else {
                $this->session->set_flashdata('error', 'Sign-up failed! Database error occured');
                redirect('admin/sign-up');
            }
        }
    }

    /**
     * Check whether user session exists
     * if exist, redirect to dashboard
     *
     * @return boolean
     */
    public function checkAdminSession() {
        if ($this->session->has_userdata('name') && $this->session->userdata('name') !== '') {
            redirect('admin/dashboard');
        }
        return true;
    }

    /**
     * Show admin dashboard
     */
    public function dashboard() {
        $this->load->view('admin/dashboard');
    }

    /**
     * Destroy user session and redirect to login page
     */
    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    /**
     * Show student list in table
     */
    public function showStudentList() {
        $students = $this->ma->getStudentList();
        $this->load->view('admin/all_students', ['students' => $students]);
    }

    /**
     * Show student add form
     */
    public function newStudent() {
        $this->load->view('admin/add_new_student');
    }

    /**
     * Process student form data and add into database
     */
    public function addNewStudent() {
        $this->form_validation->set_rules('stu_name', 'Student Name', 'required');
        $this->form_validation->set_rules('stu_roll', 'Student Roll', 'required');
        $this->form_validation->set_rules('reg', 'Registration No', 'required');
        $this->form_validation->set_rules('board', 'Board', 'required');
        $this->form_validation->set_rules('institute', 'Institute', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Please, fill the form properly!');
            redirect('admin/new-student');
        } else {
            $stuName = $this->input->post('stu_name', true);
            $stuRoll = $this->input->post('stu_roll', true);
            $reg = $this->input->post('reg', true);
            $board = $this->input->post('board', true);
            $institute = $this->input->post('institute', true);
            $this->ma->insertStudentData($stuName, $stuRoll, $reg, $board, $institute);
            $this->session->set_flashdata('success', 'Congatulations! Student has been added');
            redirect(base_url() . 'admin/all-students');
        }
    }

    public function add_result() {
        $this->load->view('admin/add_result');
    }

    /**
     *
     * @param type $roll
     */
    public function updateResult($roll) {
        $studentResult = $this->ma->getSingleStudentResult($roll);
        if (!empty($studentResult)) {
            $this->load->view('admin/update_marks', ['results' => $studentResult]);
        } else {
            $this->load->view('admin/notice1');
        }
    }

    /**
     * Show student information
     */
    public function view($roll) {
        $students = $this->ma->getSingleStudentinfo($roll);
        $this->load->view('admin/view', ['students' => $students]);
    }

    /**
     * Delete a student
     *
     * @param string $roll
     */
    public function delete($roll) {
        $studentInfo = $this->ma->getSingleStudentinfo($roll);

        if (empty($studentInfo)) {
            $this->session->set_flashdata('error', 'Student information not found!');
        } else {
            $this->ma->deleteSingleStudent(intval($studentInfo->student_id));
            $this->session->set_flashdata('success', 'Student has been deleted successfully!');
            redirect('admin/all-students');
        }
    }

    /**
     * Add student result-marks if not exists
     *
     * @param string $roll
     */
    public function addMarks($roll) {
        if ($this->input->post()) {
            $studentInfo = $this->ma->getSingleStudentinfo($roll);

            if (!empty($studentInfo)) {
                $this->addStudentMarks(intval($studentInfo->student_id));
            } else {
                $this->session->set_flashdata('error', 'Student information not found!');
                redirect('admin/all-students');
            }
        }

        $result = $this->ma->getSingleStudentResult($roll);
        if ($result) {
            $this->load->view('admin/notice2');
        } else {
            $students = $this->ma->getSingleStudentinfo($roll);
            $this->load->view('admin/add_result', ['students' => $students, 'roll' => $roll]);
        }
    }

    /**
     * Process student marks and add into database
     * 
     * @param int $studentId
     */
    protected function addStudentMarks($studentId) {
        $studentInfo = $this->db->get_where(T_STUDENT_INFO, ['student_id' => intval($studentId)])->row();
        if (empty($studentInfo)) {
            $this->session->set_flashdata('error', 'Student information not found!');
            redirect(base_url('admin/all-students'));
        } elseif ($this->_studentResultFormValidation() === false) {
            $this->session->set_flashdata('error', 'Please, fill the form properly!');
            return false;
        }

        $bangla = intval($this->input->post('ban'));
        $english = intval($this->input->post('en'));
        $math = intval($this->input->post('mat'));
        $sc = intval($this->input->post('sci'));
        $socioSc = intval($this->input->post('ss'));
        $rlg = intval($this->input->post('religion'));

        $banGrade = checkGrade($bangla);
        $banGpa = checkGpa($bangla);

        $enGrade = checkGrade($english);
        $enGpa = checkGpa($english);

        $matGrade = checkGrade($math);
        $matGpa = checkGpa($math);

        $sciGrade = checkGrade($sc);
        $sciGpa = checkGpa($sc);

        $ssGrade = checkGrade($socioSc);
        $ssGpa = checkGpa($socioSc);

        $religionGrade = checkGrade($rlg);
        $religionGpa = checkGpa($rlg);

        $stuCgpa = checkCgpa($banGpa, $enGpa, $matGpa, $sciGpa, $ssGpa, $religionGpa);
        $stuCgpaRound = round($stuCgpa, 2);

        $gradeAlpha = checkGradeAlpha($stuCgpa);
        $result = checkResult($banGpa, $enGpa, $matGpa, $sciGpa, $ssGpa, $religionGpa);

        $studentMark = [
          'student_id' => $studentId,
          'b_m' => $bangla,
          'b_g' => $banGrade,
          'b_c' => $banGpa,
          'e_m' => $english,
          'e_g' => $enGrade,
          'e_c' => $enGpa,
          'm_m' => $math,
          'm_g' => $matGrade,
          'm_c' => $matGpa,
          's_m' => $sc,
          's_g' => $sciGrade,
          's_c' => $sciGpa,
          'ss_m' => $socioSc,
          'ss_g' => $ssGrade,
          'ss_c' => $ssGpa,
          'r_m' => $rlg,
          'r_g' => $religionGrade,
          'r_c' => $religionGpa,
          'cgpa' => $stuCgpaRound,
          'grade_alpha' => $gradeAlpha,
          'result' => $result,
        ];

        if ($this->ma->addSingleStudentMark($studentMark)) {
            $this->session->set_flashdata('success', 'Congatulations!');
            redirect('admin/all-students');
        } else {
            $this->session->set_flashdata('error', 'Failed to insert marks!');
            redirect('add-marks/' . $studentInfo->stu_roll);
        }
    }

    /**
     * Student mark results form validation
     * @return type
     */
    private function _studentResultFormValidation() {
        $this->form_validation->set_rules('ban', 'Bangla', 'required');
        $this->form_validation->set_rules('en', 'English', 'required');
        $this->form_validation->set_rules('mat', 'Math', 'required');
        $this->form_validation->set_rules('sci', 'Science', 'required');
        $this->form_validation->set_rules('ss', 'Social Science', 'required');
        $this->form_validation->set_rules('religion', 'Religion', 'required');
        return $this->form_validation->run();
    }

    /**
     * Update student marks
     */
    public function editMarks() {
        $studentId = intval($this->input->post('student_id'));

        $studentInfo = $this->db->get_where(T_STUDENT_INFO, ['student_id' => $studentId])->row();

        if (empty($studentInfo)) {
            $this->session->set_flashdata('error', 'Student information not found!');
            redirect(base_url('admin/all-students'));
        } elseif ($this->_studentResultFormValidation() === false) {
            $this->session->set_flashdata('error', 'Please, fill the form properly!');
            redirect(base_url('admin/update-result/' . $studentInfo->stu_roll));
        }

        $bangla = intval($this->input->post('ban'));
        $english = intval($this->input->post('en'));
        $math = intval($this->input->post('mat'));
        $sc = intval($this->input->post('sci'));
        $socioSc = intval($this->input->post('ss'));
        $rlg = intval($this->input->post('religion'));

        $banGrade = checkGrade($bangla);
        $banGpa = checkGpa($bangla);

        $enGrade = checkGrade($english);
        $enGpa = checkGpa($english);

        $matGrade = checkGrade($math);
        $matGpa = checkGpa($math);

        $sciGrade = checkGrade($sc);
        $sciGpa = checkGpa($sc);

        $ssGrade = checkGrade($socioSc);
        $ssGpa = checkGpa($socioSc);

        $religionGrade = checkGrade($rlg);
        $religionGpa = checkGpa($rlg);

        $stuCgpa = checkCgpa($banGpa, $enGpa, $matGpa, $sciGpa, $ssGpa, $religionGpa);
        $stuCgpaRound = round($stuCgpa, 2);

        $gradeAlpha = checkGradeAlpha($stuCgpa);
        $result = checkResult($banGpa, $enGpa, $matGpa, $sciGpa, $ssGpa, $religionGpa);

        $studentMark = [
          'b_m' => $bangla,
          'b_g' => $banGrade,
          'b_c' => $banGpa,
          'e_m' => $english,
          'e_g' => $enGrade,
          'e_c' => $enGpa,
          'm_m' => $math,
          'm_g' => $matGrade,
          'm_c' => $matGpa,
          's_m' => $sc,
          's_g' => $sciGrade,
          's_c' => $sciGpa,
          'ss_m' => $socioSc,
          'ss_g' => $ssGrade,
          'ss_c' => $ssGpa,
          'r_m' => $rlg,
          'r_g' => $religionGrade,
          'r_c' => $religionGpa,
          'cgpa' => $stuCgpaRound,
          'grade_alpha' => $gradeAlpha,
          'result' => $result,
        ];

        $this->ma->updateStudentMark($studentId, $studentMark);

        $this->session->set_flashdata('success', 'Marks updated successfully!');
        redirect(base_url('admin/all-students'));
    }

//    public function searchstudent() {
//        $board = $this->input->post('board');
//        $roll = $this->input->post('roll');
//        $reg = $this->input->post('reg');
//        $this->load->model('Admin_model');
//        $this->form_validation->set_rules('board', 'Board', 'required');
//        $this->form_validation->set_rules('roll', 'Roll No', 'required');
//        $this->form_validation->set_rules('reg', 'Registration No', 'required');
//        if ($this->form_validation->run() == false) {
//            $this->session->set_flashdata('error', 'Please, fill the form properly!');
//            $this->load->view('index');
//        } else {
//            $results = $this->Admin_model->getStudentResult($board, $roll, $reg);
//            if ($results) {
//                $this->load->view('search', ['results' => $results]);
//            } else {
//                $this->session->set_flashdata('error', 'No result found!');
//                $this->load->view('index');
//            }
//        }
//    }
}






