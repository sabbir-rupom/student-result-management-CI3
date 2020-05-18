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
                        <form action="<?php echo base_url('admin/add-new-student'); ?>" method="POST">

                            <div class="form-group">
                                <label for="">Student Name</label>
                                <input name="stu_name" class="form-control" type="text" required="true">
                            </div>

                            <div class="form-group">
                                <label for="">Student Roll</label>
                                <input name="stu_roll" class="form-control" type="text" required="true">
                            </div>

                            <div class="form-group">
                                <label for="">Registration No</label>
                                <input name="reg" class="form-control" type="text" required="true">
                            </div>

                            <div class="form-group">
                                <label for="">Board</label>
                                <select class="form-control" name="board" required="true">
                                    <option value="" selected>Select One</option>
                                    <option value="barisal">Barisal</option>
                                    <option value="chittagong">Chittagong</option>
                                    <option value="comilla">Comilla</option>
                                    <option value="dhaka">Dhaka</option>
                                    <option value="dinajpur">Dinajpur</option>
                                    <option value="jessore">Jessore</option>
                                    <option value="rajshahi">Rajshahi</option>
                                    <option value="sylhet">Sylhet</option>
                                    <option value="madrasah">Madrasah</option>
                                    <option value="tec">Technical</option>
                                    <option value="dibs">DIBS(Dhaka)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Institute</label>
                                <input name="institute" class="form-control" type="text" required="true">
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

<?php
$this->load->view('admin/include/footer'); 
