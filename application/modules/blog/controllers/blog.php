<?php
class Blog extends MX_Controller
{
	protected $_template;

	//Constructor
	public function __construct()
	{
		parent::__construct();

		$this->load->model('blog_model','blog');
		$this->load->model('users_model','users');

		$this->load->library('user_agent');

		$this->load->language('general','english');
		$this->load->language('sidebar','english');

		$this->load->library('securimage_library');
	}

	public function index($page = null)
	{
        $this->load->library('pagination');

        $config['total_rows'] = $this->blog->get_posts_count();
		$config['per_page'] = $this->blog->get_posts_per_page();

        $this->pagination->initialize($config);

        $pages_count = ceil($config['total_rows'] / $config['per_page']);
		$page = ($page == 0) ? 1 : $page;
		$offset = $config['per_page'] * ($page - 1);

		if ($data['posts'] = $this->blog->get_posts($config['per_page'], $offset))
		{
			if ($page > $pages_count)
			{
				redirect('blog', 'refresh');
			}

			$data['posts_per_page'] = $this->blog->get_posts_per_page();
			$data['posts_count'] = $this->blog->get_posts_count();
			$data['pages_count'] = $pages_count;
			$data['current_page'] = $page;
			$data['next_page'] = $page + 1;
			$data['previous_page'] = $page - 1;

			foreach ($data['posts'] as $key => $post)
			{
				$data['posts'][$key]['url'] = post_url($post['url_title'], $post['date_posted']);
				$data['posts'][$key]['display_name'] = $this->users->get_user_display_name($post['author']);
			}

			$this->_template['page']	= 'blog/blog_list';
		}
		else
		{
			$this->_template['page']	= 'errors/no_posts';
		}

		$this->system_library->load($this->_template['page'], $data);

	}

}
