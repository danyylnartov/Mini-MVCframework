<?php

namespace app\controllers;

use app\models\Main;
use mvcframework\libs\Pagination;
use R;
use mvcframework\core\App;
use mvcframework\core\base\View;

class MainController extends AppController {

//	public $layout = 'main';

	public function indexAction() {


		$model = new Main();

		$lang = App::$app->getProperty('lang')['code'];
		$total = R::count('posts', 'lang_code = ?', [$lang]);
		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$perpage = 1;

		$pagination = new Pagination($page, $perpage, $total);
		$start = $pagination->getStart();

		$posts = R::findAll('posts', "lang_code = ? LIMIT $start, $perpage", [$lang]);

		View::setMeta('Blog :: Главная страница', 'Описание страницы', 'Ключевые слова');
		$this->set(compact( 'posts', 'pagination', 'total'));
	}

	public function testAction() {
		if ($this->isAjax()) {
			$model = new Main();
//			$data = ['answer' => 'Ответ с сервера', 'code' => 200];
//			echo json_encode($data);
			$post = \R::findOne('posts', "id = {$_POST['id']}");
			$this->loadView('_test', compact('post'));
			die();
		}
		echo 222;
//		$this->layout = false;
	}

}