<?php $this->load->view('admin/include/header'); ?>

<div class="row">
    <div class="col-md-10" style="margin: 50px 20px 50px 50px;">
        <section class="panel b-a" style="min-height: 400px;">
            <div class="panel-heading b-b">
                <a href="#" class="font-bold">Please, fill the form</a></div>
                <div class="card" style="padding: 30px;">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="<?php echo base_url('edit-marks'); ?>" method="POST">
                            <div class="form-group">
                                <label for="">Bangla</label>
                                <input name="ban" class="form-control" type="text" value="<?php echo $results->b_m; ?>">
                            </div>
                            <div class="form-group">
                                <input name="student_id" type="hidden" value="<?php echo $results->student_id; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">English</label>
                                <input name="en" class="form-control" type="text" value="<?php echo $results->e_m; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Math</label>
                                <input name="mat" class="form-control" type="text" value="<?php echo $results->m_m; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Science</label>
                                <input name="sci" class="form-control" type="text" value="<?php echo $results->s_m; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Social Science</label>
                                <input name="ss" class="form-control" type="text" value="<?php echo $results->ss_m; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Religion</label>
                                <input name="religion" class="form-control" type="text" value="<?php echo $results->r_m; ?>">
                            </div>
                            <div class="form-group">
                                
                                <input name="submit" class="btn btn-success" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>






