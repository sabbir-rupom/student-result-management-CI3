<!DOCTYPE html>
<html lang="en" class=" ">
    <head>
        <meta charset="utf-8" />
        <title>Admin Signup</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="<?= base_url('assets/css/app.v1.css') ?>" type="text/css" />
    </head>
    <body class="">
        <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
            <div class="container aside-xl"> <a class="navbar-brand block" href="<?= base_url('admin/index') ?>">Admin Panel</a>
                <section class="m-b-lg">
                    <header class="wrapper text-center"> <strong>Sign up to access student database</strong> </header>
                    <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success" role="alert">
                            <h6><?php echo $this->session->flashdata('success'); ?></h6></div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger" role="alert">
                            <h6><?php echo $this->session->flashdata('error'); ?></h6></div>
                    <?php } ?>
                    <form name="signUp" action="<?php echo base_url('admin/process-sign-up'); ?>" method="post">
                        <div class="list-group">
                            <div class="list-group-item">
                                <label>Name</label>
                                <input name="name" placeholder="" class="form-control no-border"
                                       value="<?php echo set_value('name'); ?>">
                            </div>
                            <div class="list-group-item">
                                <label>Email</label>
                                <input name="email" type="text" placeholder="" class="form-control no-border" value="<?php echo set_value('email'); ?>">
                            </div>
                            <div class="list-group-item">
                                <label>Password</label>
                                <input name="pass" type="password" placeholder="" class="form-control no-border">
                            </div>
                        </div>
                        <button name="submit"  type="submit" class="btn btn-lg btn-primary btn-block">Sign up</button>
                        <div class="line line-dashed"></div>
                        <p class="text-muted text-center"><small>Already have an account?</small></p> <a href="<?php echo base_url('admin/login'); ?>" class="btn btn-lg btn-default btn-block">Sign in</a>
                    </form>
                </section>
            </div>
        </section>
    </body>
</html>

