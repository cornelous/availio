<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Application {

	public function action_index()
	{
	    $session = Session::instance();
        $username = $session->get('username');

//         protecting my controllers --- to make a helper class later
//        if (!isset($username))
//        {
//          $this->request->redirect('login');
//        }

        $user = new Model_Property;
        $user_count = $user->count_all();

        $pagination = Pagination::factory(array(
            'total_items'
            => $user_count,
            'items_per_page' => 3,
        ));
        $pager_links = $pagination->render();

        $users = $user->get_all($pagination->items_per_page,
            $pagination->offset);

        $view = View::factory('property')
            ->bind('properties', $users)
            ->bind('pager_links', $pager_links);

        $this->template->view = $view;
	}



} // End Welcome
