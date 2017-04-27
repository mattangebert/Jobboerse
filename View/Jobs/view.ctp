<!-- File: /app/View/Jobs/view.ctp -->

 <?php $this->layout = 'jobboerse' ?>
 
<h1><?php echo h($job['Job']['JobTitel']); ?></h1>

<p><small>gesucht ab: <?php echo $job['Job']['Datum']; ?></small></p>

<p><small>Jobbeschreibung:  <?php echo $job['Job']['JobBeschreibung']; ?></small></p>

<p><small>Arbeitgeber: <?php echo $job['Job']['Arbeitgeber']; ?></small></p>

<p><small>Arbeitsort: <?php echo $job['Job']['Arbeitsort']; ?></small></p>

<p><small>Website: <?php echo $job['Job']['Website']; ?></small></p>

<p><small>Email: <?php echo $job['Job']['email']; ?></small></p>

<p><small>Job ist: <?php echo $available; ?></small></p>

<!-- undefined content for ectended view token -->
 <h1><?php echo $this->fetch('buttons'); ?></h1>
<?php echo $this->fetch('content'); ?>