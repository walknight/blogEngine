<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        //cek apakah yang login adalah administrator
        $this->access_library->check_access();


    }

    public function index()
    {

        $this->config->load('blog_config');

		$data['website_url']		= $this->config->item('website_url');
		$data['new_version'] 		= $this->system_library->check_for_upgrade();

		$this->_template['page']	= 'dashboard';

		$this->system_library->load($this->_template['page'], $data, TRUE);

    }

    public function login()
    {
        if (!$this->access_library->is_logged_in())
		{
			if ($this->input->post('username') != "" && $this->input->post('password') != "")
			{
				$this->user->verify_user($this->input->post('username'), $this->input->post('password'));

				if ($this->session->userdata('level') == 'administrator')
				{
					$this->user->update_last_login();
					redirect('admin/dashboard','refresh');
				}else{
					redirect('user/login', 'refresh');
				}
			}
			else
			{
				$this->_template['page']	= 'admin/login';

				$this->system_library->load($this->_template['page']);
			}
		}
		else
		{
			redirect('blog', 'refresh');
		}
    }

    public function logout()
	{
		if ($this->access_library->is_logged_in())
		{
			$this->user->logout();

			redirect('blog', 'refresh');
		}
		else
		{
			redirect('blog', 'refresh');
		}
	}


}
