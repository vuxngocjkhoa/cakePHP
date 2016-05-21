<?php
App::uses('SluggableBehavior', 'Utils.Behavior');
App::uses('SluggableBehavior', 'Utils/Behavior');
class Post extends AppModel {

    var $name = 'Post';
	
	public $actsAs = array(
		'Utils.Sluggable' => array(
			'label' => 'title',
			'method' => 'multibyteSlug',
			'separator' => '-'
		)
	);
	
    //validate form
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }

}

?>
