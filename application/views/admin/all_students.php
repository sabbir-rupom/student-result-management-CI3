<?php $this->load->view('admin/include/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-10" style="margin: 50px 20px 50px 50px;">
            <section class="panel b-a" style="min-height: 400px;">
                <div class="panel-heading b-b"> <span class="badge bg-warning pull-right"></span> <a href="#" class="font-bold">All Students Information</a> </div>
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success" role="alert">
                        <h6><?php echo $this->session->flashdata('success'); ?></h6></div>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger" role="alert">
                        <h6><?php echo $this->session->flashdata('error'); ?></h6></div>
                <?php } ?>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Student SL</th>
                                    <th>Student Name</th>
                                    <th>Student Roll</th>
                                    <th>Registration No</th>
                                    <th>Board</th>
                                    <th>Institute</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 01; ?>
                                <?php if (!empty($students)): ?>
                                    <?php foreach ($students as $students): ?>
                                        <tr>
                                            <td><?php
                                                echo $i;
                                                $i++;
                                                ?></td>
                                            <td><?php echo $students->stu_name; ?></td>
                                            <td><?php echo $students->stu_roll; ?></td>
                                            <td><?php echo $students->reg; ?></td>
                                            <td><?php echo $students->board; ?></td>
                                            <td><?php echo $students->institute; ?></td>
                                            <td>
                                                <a type="button" class="btn btn-info btn-sm" href="<?php echo base_url('add-marks/' . $students->stu_roll); ?>">Add</a>
                                                <a type="button" class="btn btn-danger btn-sm" href="<?php echo base_url('delete/' . $students->stu_roll); ?>">Delete</a>
                                                <a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url('view/' . $students->stu_roll); ?>">View</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td><?php echo "No Result found"; ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php
$this->load->view('admin/include/footer');
