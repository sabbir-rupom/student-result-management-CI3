<?php $this->load->view('include/header'); ?>

<form action="<?= base_url('search-student'); ?>" method="POST">
    <fieldset>
        <legend>Result Management System</legend>

        <div class="form-group">
            <label>Roll No</label>
            <input class="form-control" required="true" name="roll" type="text" placeholder="Roll No">
        </div>
        <div class="form-group">
            <label>Registration No</label>
            <input class="form-control" required="true" name="reg" type="text" placeholder="Registration No">
        </div>
        <div class="form-group">
            <label>Board</label>
            <select class="form-control" name="board" required="true">
                <option value=""selected>Select One</option>
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
</form>
<br>
<a type="button" class="btn btn-info btn-lg" href="<?php echo base_url('admin'); ?>">Click here if you are an Admin</a>

<?php $this->load->view('include/footer'); ?>




