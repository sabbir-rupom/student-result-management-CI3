<?php $this->load->view('include/header'); ?>
<div class="wraper">
    <div class="w-main">
        <?php
        if (!empty($results)) :
            ?>
            <div class="student-info">
                <div class="student-photo">
                    <img src="assets/images/p10.jpg" alt="">
                </div>
                <div class="student-details">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><?php echo $studentInfo->stu_name; ?></td>
                        </tr>
                        <tr>
                            <td>Roll</td>
                            <td><?php echo $studentInfo->stu_roll ?></td>
                        </tr>
                        <tr>
                            <td>Reg.</td>
                            <td><?php echo $studentInfo->reg ?></td>
                        </tr>
                        <tr>
                            <td>Board</td>
                            <td><?php echo $studentInfo->board ?></td>
                        </tr>
                        <tr>
                            <td>Institute</td>
                            <td><?php echo $studentInfo->institute ?></td>
                        </tr>
                        <tr>
                            <td>Result</td>
                            <?php
                            if ($results->result == 'Passed') :
                                ?>
                                <td>
                                    <span style="color:green;font-weight:bold;">Passed</span>
                                </td>
                                <?php
                            else :
                                ?>
                                <td>
                                    <span style="color:red;font-weight:bold;">Failed</span>
                                </td>
                            <?php endif; ?>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="student-result">
                <table>
                    <tr>
                        <td>Subject</td>
                        <td>Marks</td>
                        <td>Grade</td>
                        <td>GPA</td>
                        <td>CGPA</td>
                    </tr>
                    <tr>
                        <td>Bangla</td>
                        <td><?php echo $results->b_m; ?></td>
                        <td><?php echo $results->b_g; ?></td>
                        <td><?php echo $results->b_c; ?></td>
                        <td rowspan="6"><?php echo $results->cgpa; ?></td>
                    </tr>
                    <tr>
                        <td>English</td>
                        <td><?php echo $results->e_m; ?></td>
                        <td><?php echo $results->e_g; ?></td>
                        <td><?php echo $results->e_c; ?></td>
                    </tr>
                    <tr>
                        <td>Math</td>
                        <td><?php echo $results->m_m; ?></td>
                        <td><?php echo $results->m_g; ?></td>
                        <td><?php echo $results->m_c; ?></td>
                    </tr>
                    <tr>
                        <td>Science</td>
                        <td><?php echo $results->s_m; ?></td>
                        <td><?php echo $results->s_g; ?></td>
                        <td><?php echo $results->s_c; ?></td>
                    </tr>
                    <tr>
                        <td>Social Science</td>
                        <td><?php echo $results->ss_m; ?></td>
                        <td><?php echo $results->ss_g; ?></td>
                        <td><?php echo $results->ss_c; ?></td>
                    </tr>
                    <tr>
                        <td>Religion</td>
                        <td><?php echo $results->r_m; ?></td>
                        <td><?php echo $results->r_g; ?></td>
                        <td><?php echo $results->r_c; ?></td>
                    </tr>
                </table>
            </div>
            <?php
        else:
            echo '<h2>Student result not found</h2>';
        endif;
        ?>
        <a type="button" class="btn btn-info btn-lg" href="<?php echo base_url(); ?>">Back</a>
    </div>
</div>	

<?php $this->load->view('include/footer'); ?>



