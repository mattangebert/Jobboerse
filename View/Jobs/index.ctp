<!-- File: /app/View/Jobs/index.ctp -->
 
 <?php $this->layout = 'jobboerse' ?>

<table>

    <tr>
		<th>Jobtitel</th>
		<th>gesucht ab</th>
		<th>Arbeitsort</th>
        <th>Verfügbarkeit</th>
		<th>Actions</th>
    </tr>

    <!-- looping through $jobs array, printing out job info -->
    <?php foreach ($jobs as $job): ?>
    <tr>
		<td>
            <?php echo $this->Html->link(
				$job['Job']['JobTitel'],
				array('controller' => 'jobs', 'action' => 'view', $job['Job']['id'])
			); 
		 ?>
        </td>
		<td><?php echo $job['Job']['Datum']; ?></td>
        <td><?php echo $job['Job']['Arbeitsort']; ?></td>
		<td><?php echo $job['Job']['Verfuegbarkeit']; ?></td>
		<td>
			<?php
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
			?>
		</td>
    </tr>
    <?php endforeach; ?>

</table>


<?php echo $this->Html->link(
    'Job erstellen',
    array('controller' => 'jobs', 'action' => 'add')
); ?>

