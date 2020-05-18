<!DOCTYPE html>
<html lang="en" class=" ">
    <head>
        <meta charset="utf-8" />
        <title>Education Board Result</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
        <link rel="stylesheet" href="assets/ui_assets/css/syle.css">
        <link rel="stylesheet" href="assets/css/app.v1.css" type="text/css" />
    </head>
    <body>
        <div class="container">
            <?php
            $successMsg = $this->session->flashdata('success');
            $errorMsg = $this->session->flashdata('error');
            if (isset($successMsg) && !empty($successMsg)) {
                ?>
                <div class="alert alert-success" role="alert">
                    <h6><?= $successMsg ?></h6>
                </div>
                <?php
            }
            if (isset($errorMsg) && !empty($errorMsg)) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <h6><?= $errorMsg ?></h6>
                </div>
                <?php
            }

