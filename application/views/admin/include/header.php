<!DOCTYPE html>
<html lang="en" class="app">
    <head>
        <meta charset="utf-8" />
        <title>Admin Panel</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="<?= base_url('assets/css/app.v1.css') ?>" type="text/css" />
    </head>
    <body class="">
        <section class="vbox">
            <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
                <div class="navbar-header aside-md dk">
                    <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a>
                    <a href="#" class="navbar-brand"> <img src="<?= base_url('assets/images/logo.png') ?>" class="m-r-sm" alt="scale">
                        <span class="hidden-nav-xs">Result Database</span>
                    </a>
                    <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a>
                </div>
            </header>
            <section class="scrollable">
                <section class="hbox stretch">
                    <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">
                        <section class="vbox">
                            <section class="w-f scrollable">
                                <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                                    <div class="clearfix wrapper dk nav-user hidden-xs">
                                        <div class="dropdown">
                                            <a href="<?php echo base_url('admin/logout'); ?>" class="" data-toggle=""> <span class="thumb avatar pull-left m-r"> <img src="<?= base_url('assets/images/a0.png') ?>" class="dker" alt="..."> <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> <strong class="font-bold text-lt"><?php echo $this->session->name; ?></strong> <b class="caret"></b> </span> <span class="text-muted text-xs block">Logout</span> </span>
                                        </a>
                                      
                                    </div>
                                </div>
                                <nav class="nav-primary hidden-xs">
                                    <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>
                                    <ul class="nav nav-main" data-ride="collapse">
                                        <li class="active">
                                            <a href="#" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Dashboard</span> </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('admin/all-students'); ?>" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <b class="badge bg-danger pull-right"></b> <i class="i i-stack icon"> </i> <span class="font-bold">All Students</span> </a>
                                            <ul class="nav dk">
                                                
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('admin/new-student'); ?>" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <b class="badge bg-danger pull-right"></b> <i class="i i-stack icon"> </i> <span class="font-bold">Add New Student</span> </a>
                                            <ul class="nav dk">
                                            </ul>
                                        </li>
                                    </ul>
                                </section>
                            </section>
                        </aside>

                        
                        
                                    





