<!-- File: /app/View/Jobs/add.ctp -->

 <?php $this->layout = 'jobboerse' ?>

<h1>Job erstellen</h1>

<?php
echo $this->Form->create('Job');
echo $this->Form->input('TokenID', array('type' => 'hidden', 'default' => $TokenID));
echo $this->Form->input('JobTitel');
echo $this->Form->input('JobBeschreibung', array('rows' => '3'));
echo $this->Form->input('Datum');
echo $this->Form->input('Arbeitgeber');
echo $this->Form->input('Arbeitsort');
echo $this->Form->input('Website');
echo $this->Form->input('email');
echo $this->Form->input('Verfuegbarkeit', array('type'=>'checkbox','checked'=>true));
echo $this->Form->end('Job speichern');
?>