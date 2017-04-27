 <!DOCTYPE html>
<html>
<body>

<?php

class Job extends AppModel {
    public $validate = array(
        'JobTitel' => array(
            'rule' => 'notEmpty'
        ),
		'JobBeschreibung' => array(
            'rule' => 'notEmpty'
        ),
        'Arbeitgeber' => array(
            'rule' => 'notEmpty'
        ),
		'Arbeitsort' => array(
            'rule' => 'notEmpty'
        ),
		'email' => array(
            'rule' => 'notEmpty'
        )
    );
}

?>

</body>
</html> 