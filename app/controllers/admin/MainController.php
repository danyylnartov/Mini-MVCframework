<?php


namespace app\controllers\admin;


use R;

class MainController extends AppController {

	public function indexAction() {
		$posts = R::findAll('posts');
		$this->set(compact('posts')	);
	}

}