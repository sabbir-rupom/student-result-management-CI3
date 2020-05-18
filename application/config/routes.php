<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**
 * User Routes
 */
$route['search'] = 'home/search';
$route['search-student'] = 'home/searchStudent';


/**
 * Admin Routes
 */

$route['admin'] = 'admin/index';
$route['admin/login'] = 'admin/signIn';
$route['admin/sign-up'] = 'admin/signUp';
$route['admin/process-sign-up'] = 'admin/processSignUp';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/logout'] = 'admin/logout';
$route['admin/all-students'] = 'admin/showStudentList';
$route['admin/new-student'] = 'admin/newStudent';
$route['admin/add-new-student'] = 'admin/addNewStudent';
$route['admin/add-result'] = 'admin/addResult';
$route['admin/update-result'] = 'admin/updateResult';
$route['admin/update-result/(:any)'] = 'admin/updateResult/$1';
$route['admin/delete-student'] = 'admin/deleteStudent';

$route['view/(.+)'] = 'admin/view/$1';
$route['delete/(.+)'] = 'admin/delete/$1';
$route['add-marks/(.+)'] = 'admin/addMarks/$1';
$route['edit-marks'] = 'admin/editMarks';

