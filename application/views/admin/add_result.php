<?php $this->load->view('admin/include/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-10" style="margin: 50px 20px 50px 50px;">
            <section class="panel b-a" style="min-height: 400px;">
                <div class="panel-heading b-b"> <span class="badge bg-warning pull-right"></span> <a href="#" class="font-bold">Please, fill the form</a> </div>
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success" role="alert">
                        <h6><?php echo $this->session->flashdata('success'); ?></h6></div>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger" role="alert">
                        <h6><?php echo $this->session->flashdata('error'); ?></h6></div>
                <?php } ?>
                <div class="card" style="padding: 30px;">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="<?php echo base_url('add-marks/' . $roll); ?>" method="POST">

                            <div class="form-group">
                                <label for="">Bangla</label>
                                <input name="ban" class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                <input name="stu_name" class="form-control" type="hidden" value="<?php echo $students->stu_name ?>">
                            </div>

                            <div class="form-group">
                                <label for="">English</label>
                                <input name="en" class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                <input name="stu_roll" class="form-control" type="hidden" value="<?php echo $students->stu_roll ?>">
                            </div>

                            <div class="form-group">
                                <label for="">Math</label>
                                <input name="mat" class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                <input name="reg" class="form-control" type="hidden" value="<?php echo $students->reg ?>">
                            </div>

                            <div class="form-group">
                                <label for="">Science</label>
                                <input name="sci" class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                <input name="board" class="form-control" type="hidden" value="<?php echo $students->board ?>">
                            </div>

                            <div class="form-group">
                                <label for="">Social Science</label>
                                <input name="ss" class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                <input name="institute" class="form-control" type="hidden" value="<?php echo $students->institute ?>">
                            </div>

                            <div class="form-group">
                                <label for="">Religion</label>
                                <input name="religion" class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                <input name="submit" class="btn btn-success" type="submit" value="Submit">
                            </div>

                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>





