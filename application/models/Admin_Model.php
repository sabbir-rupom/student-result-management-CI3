<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Admin_Model
 * Model class for application's database handle
 *
 * @property CI_DB_query_builder $db
 *
 */
class Admin_Model extends CI_Model {

    /**
     * Check admin credentials
     * 
     * @param string $email
     * @param string $pass
     * @return object|bool
     */
    public function signIn(string $email, string $pass) {
        $result = $this->db->get_where(T_ADMIN, array('email' => $email, 'status' => 1))->row();

        if (empty($result)) {
            $this->session->set_flashdata('error', 'Email does not exist!');
            return false;
        }

        if (password_verify($pass, $result->pass)) {
            return $result;
        } else {
            $this->session->set_flashdata('error', 'Password did not match!');
            return false;
        }
    }

    /**
     * Insert admin user data into table
     *
     * @param string $name
     * @param string $email
     * @param string $pass
     * @param string $status
     * @return int|bool
     */
    public function insertAdminData(string $name, string $email, string $pass) {
        $adminData = [
          'name' => $name,
          'email' => $email,
          'pass' => password_hash($pass, PASSWORD_BCRYPT, ['cost' => 12]),
          'status' => 1
        ];

        $result = $this->db->insert(T_ADMIN, $adminData);
        return $result ? $this->db->insert_id() : false;
    }

    /**
     * Check admin exist or not
     * 
     * @param string $email
     * @param string $pass
     * @return object|null
     */
    public function getAdminInfo(string $email, string $pass) {
        $query = $this->db->select('*')
            ->from(T_ADMIN)
            ->where(['email' => $email, 'pass' => $pass])
            ->get();
        return $query->row();
    }

    /**
     *
     * @param string $stuName
     * @param string $stuRoll
     * @param string $reg
     * @param string $board
     * @param string $institute
     * @return int|bool
     */
    public function insertStudentData(string $stuName, string $stuRoll, string $reg, string $board, string $institute) {
        $studentData = [
          'stu_name' => $stuName,
          'stu_roll' => $stuRoll,
          'reg' => $reg,
          'board' => $board,
          'institute' => $institute
        ];

        $result = $this->db->insert(T_STUDENT_INFO, $studentData);
        return $result ? $this->db->insert_id() : false;
    }

    /**
     * Get all student information
     *
     * @return object|false
     */
    public function getStudentList() {
        $query = $this->db->get(T_STUDENT_INFO);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    /**
     * Get student result information
     *
     * @return object|false
     */
    public function getResultinfo() {
        $query = $this->db->get(T_STUDENT_RESULTT);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    /**
     * Get specific student information
     *
     * @param string $stuRoll
     * @param type $reg
     * @param type $board
     * @return type
     */
    public function getSingleStudentinfo(string $stuRoll, $reg = null, $board = null) {
        if (!empty($reg)) {
            $this->db->where('reg', $reg);
        }
        if (!empty($board)) {
            $this->db->where('board', $board);
        }
        $query = $this->db->get_where(T_STUDENT_INFO, array('stu_roll' => $stuRoll));
        return ($query->num_rows() > 0) ? $query->row() : false;
    }

    /**
     * Add student mark
     * 
     * @param array $studentMark
     * @return type
     */
    public function addSingleStudentMark(array $studentMark) {
        return $this->db->insert(T_STUDENT_RESULT, $studentMark);
    }

    /**
     * Get result of specific student
     * 
     * @param string $stuRoll
     * @return object|false
     */
    public function getSingleStudentResult(string $stuRoll) {
        $query = $this->db->select('r.*')
            ->join(T_STUDENT_RESULT . ' AS r', 'r.student_id = s.student_id', 'LEFT')
            ->where('r.result_sl is NOT NULL', NULL, FALSE)
            ->get_where(T_STUDENT_INFO . ' AS s', ['s.stu_roll' => $stuRoll]);
        return ($query->num_rows() > 0) ? $query->row() : false;
    }

    public function updateStudentMark(int $studentId, array $studentMark) {
        $this->db->where('student_id', $studentId);
        return $this->db->update(T_STUDENT_RESULT, $studentMark);
    }

    /**
     * Delete a specific student
     * 
     * @param int $studentId
     * @return boolean
     */
    public function deleteSingleStudent(int $studentId) {
        $this->db->where('student_id', $studentId)->delete(T_STUDENT_INFO);
        $this->db->where('student_id', $studentId)->delete(T_STUDENT_RESULT);

        return true;
    }

    /**
     * Get specific student's result
     *
     * @param int $studentId
     * @return object|bool
     */
    public function getStudentResult($studentId = 0) {
        $query = $this->db->get_where(T_STUDENT_RESULT, ['student_id' => $studentId]);
        return ($query->num_rows() > 0) ? $query->row() : false;
    }
}




