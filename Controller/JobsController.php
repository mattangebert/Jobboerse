

<?php
 	
App::uses('CakeEmail', 'Network/Email');
// File: /app/Controller/JobsController.php
class JobsController extends AppController {
    public $helpers = array('Html', 'Form');
	 	
// choosing layout
public function admin_view() {
    $this->layout = 'jobboerse';
}

// listing jobs
    public function index() {
	//listing
        $this->set('jobs', $this->Job->find('all'));		
    }

// changeing avaibility bool to text
	public function availableText($isAvailable) {
		$available = 'nicht verfügbar';

		if ($isAvailable){
			$available = 'verfügbar';
		} 
		
		return $available;
    }


//creating view for job via id
    public function view($id = null) {
		
        if (!$id) {
            throw new NotFoundException(__('ungültiger Job.'));
        }

        $job = $this->Job->findById($id);
        if (!$job) {
            throw new NotFoundException(__('ungültiger Job.'));
        }
		
	//changeing Verfuegbarkeit from number to text
	$this->set('available', $this->availableText($job['Job']['Verfuegbarkeit']));
		
        $this->set('job', $job);
    }

//creating token (view) for job via TokenID
    public function token($TokenID = null) {
		

		
        if (!$TokenID) {
            throw new NotFoundException(__('ungültiger Job.'));
        }

        $job = $this->Job->findByTokenid($TokenID);
        if (!$job) {
            throw new NotFoundException(__('ungültiger Job.'));
        }
		
	//changeing Verfuegbarkeit from number to text
	$this->set('available', $this->availableText($job['Job']['Verfuegbarkeit']));
		
        $this->set('job', $job);
    }
	
// creating TokenID

public function getTokenID() {
	// generating possibly unique and random id
	return String::uuid();
}		
//adding jobs
	 public function add() {
		 
	$this->set('TokenID', $this->getTokenID());
		
        if ($this->request->is('post')) {
            $this->Job->create();
				
            if ($this->Job->save($this->request->data)) {
		$this->Session->setFlash('Job erstellt');
				
		$recipient = $this->request->data['Job']['email'];
		$tokenUrl = 'www.jobboerse-mattan.gebert.eu/jobs/token/'.$this->request->data['Job']['TokenID'];
		$message = 'Sie können ihren job unter '. $tokenUrl. ' bearbeiten';
				
		$Email = new CakeEmail();
		$Email->from(array('my@example.com' => 'Jobboerse'));
		$Email->to($recipient);
		$Email->subject('Ihr erstelltes Jobangebot');
		$Email->send($message);
				
                return $this->redirect(array('action' => 'index'));

            }
            $this->Session->setFlash('Job konnte nicht erstellt werden.');
        }
    }
	
// editing jobs
public function edit($TokenID = null) {
    if (!$TokenID) {
        throw new NotFoundException(__('ungültiger Job.'));
    }

    $job = $this->Job->findByTokenid($TokenID);
    if (!$job) {
        throw new NotFoundException(__('ungültiger Job.'));
    }

    if ($this->request->is(array('job', 'put'))) {
        $this->Job->TokenID = $TokenID;
        if ($this->Job->save($this->request->data)) {
		$this->Session->setFlash('Job geupdated');
            	return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Job konnte nicht geupdated werden.');
    }

    if (!$this->request->data) {
        $this->request->data = $job;
    }
}


//deleting jobs
public function delete($TokenID) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Job->delete($TokenID)) {
	$this->Session->setFlash('Job gelöscht');
    } else {
        $this->Session->setFlash('Job konnte nicht gelöscht werden', h($TokenID));
    }

    return $this->redirect(array('action' => 'index'));
}
		
}

?>
