<!doctype html>
<html lang="en">
<head>
    <?php
    $meta = array(
        array(
            'name' => 'robots',
            'content' => 'no-cache'
        ),
        array(
            'name' => 'description',
            'content' => 'My Code Challenge'
        ),
        array(
            'name' => 'Content-type',
            'content' => 'text/html; charset=utf-8',
            'type' => 'equiv'
        ),
        array(
            'name' => 'viewport',
            'content' => 'width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no'
        )
    );

    echo meta($meta);
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
    <?= link_tag(array('href'=> base_url('assets/images'), 'type'=> 'image/png', 'size'=> '32x32')); ?>
    <?= link_tag(array('href'=> 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', 'rel'=> 'stylesheet')); ?>
    <?= link_tag(array('href'=> 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css', 'rel'=> 'stylesheet', 'type'=> 'text/css')); ?>
    <?= link_tag(array('href'=> 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/themes/explorer-fas/theme.min.css', 'rel'=> 'stylesheet', 'type'=> 'text/css')); ?>
    <?= link_tag(array('href'=> 'https://use.fontawesome.com/releases/v5.5.0/css/all.css', 'rel'=> 'stylesheet', 'type'=> 'text/css')); ?>
    <?= link_tag(array('href'=> 'http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', 'rel'=> 'stylesheet', 'type'=> 'text/css')); ?>
    <?= link_tag(array('href'=> base_url('assets/css/styles.css'), 'rel'=> 'stylesheet', 'type'=> 'text/css')); ?>
    <script>
        const BASE_URL = "<?php echo base_url(); ?>";
        const spinner  = "<i class='fa fa-spinner fa-4x fa-spin'></i>";
    </script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="javascript:;">Code Challenge</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('import'); ?>">Import</a>
            </li>
        </ul>
    </div>
</nav>
