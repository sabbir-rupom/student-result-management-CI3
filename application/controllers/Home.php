<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Home Controller
 * Show pages without session requirement
 *
 * @property Admin_Model $ma
 *
 */
class Home extends CI_Controller {

    public function index() {
        $this->load->view('home');
    }

    public function search() {
        $this->load->view('search');
    }

    public function searchStudent() {
        $board = $this->input->post('board');
        $roll = $this->input->post('roll');
        $reg = $this->input->post('reg');

        if (empty($roll)) {
            redirect();
        }

        $studentInfo = $this->ma->getSingleStudentinfo($roll, $reg, $board);

        if (!empty($studentInfo)) {
            $showResult = $this->ma->getStudentResult($studentInfo->student_id);
            $this->load->view('search', ['results' => $showResult, 'studentInfo' => $studentInfo]);
        } else {
            $this->session->set_flashdata('error', 'Student information not found!');
            redirect();
        }
    }

}

