<?php require_once ('../php/schedule_retrieval_functions.php'); ?>

<html>
    <head>
    <link rel="stylesheet" href="../css/scheduleCSS/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/scheduleCSS/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/scheduleCSS/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/scheduleCSS/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/scheduleCSS/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/scheduleCSS/style.css" type="text/css">
    </head>
    <body>
    <section class="schedule-section spad">
        <?php displaySchedule("results_table");?>
    </section>
</body>
    </html>