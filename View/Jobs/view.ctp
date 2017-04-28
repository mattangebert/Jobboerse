<!-- File: /app/View/Jobs/view.ctp -->

 <?php $this->layout = 'jobboerse' ?>
 
<h1><?php echo h($job['Job']['JobTitel']); ?></h1>

<p>gesucht ab: <small> <?php echo $job['Job']['Datum']; ?></small></p>

<p>Jobbeschreibung: <small> <?php echo $job['Job']['JobBeschreibung']; ?></small></p>

<p>Arbeitgeber: <small> <?php echo $job['Job']['Arbeitgeber']; ?></small></p>

<p>Arbeitsort: <small> <?php echo $job['Job']['Arbeitsort']; ?></small></p>

<p>Website: <small> <?php echo $job['Job']['Website']; ?></small></p>

<p>Email: <small> <?php echo $job['Job']['email']; ?></small></p>

<p>Job ist: <small> <?php echo $available; ?></small></p>

<!-- undefined content for ectended view token -->
 <h1><?php echo $this->fetch('buttons'); ?></h1>
<?php echo $this->fetch('content'); ?>