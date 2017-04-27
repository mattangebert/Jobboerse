<!-- File: /app/View/Jobs/token.ctp -->

 <?php $this->layout = 'jobboerse' ?>
<!-- extending view -->
 <?php	
	$this->extend('/jobs/token'); 
 	$this->extend('/jobs/view'); 
 ?>
<!-- extended content -->
<td>
	<?php
	$this->start('buttons');
		echo $this->Html->link(
			'Bearbeiten',
			array('action' => 'edit', $job['Job']['TokenID'])
		);
	?>
	<?php
		echo $this->Form->postLink(
			'löschen',
			array('action' => 'delete', $job['Job']['id']),
			array('confirm' => 'bist du sicher?')
		);
	$this->end();
		
	?>
</td>

