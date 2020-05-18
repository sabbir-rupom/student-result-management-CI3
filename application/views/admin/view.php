<?php $this->load->view('admin/include/header'); ?>

<div class="card container">
    <div class="card-header"><h1>Student Information</h1></div>
    <div class="card-body">
        <h2>Name: <?php echo $students->stu_name; ?></h2>
        <h3>Roll No: <?php echo $students->stu_roll; ?></h3>
        <h3>Registration No: <?php echo $students->reg; ?></h3>
        <h3>Board: <?php echo $students->board; ?></h3>
        <h3>Institute: <?php echo $students->institute; ?></h3>
    </div>
    <div class="card-footer">
        <a type="button" class="btn btn-primary btn-lg" href="<?= base_url('admin/update-result/' . $students->stu_roll); ?>">Update Student Result</a>
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>





