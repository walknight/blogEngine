<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Access_library
{
	// Constructor
	public function __construct()
	{
		if (!isset($this->CI))
		{
			$this->CI =& get_instance();
		}
	}

	// Public methods
	public function is_logged_in()
	{
		if ($this->CI->session->userdata('logged_in') == TRUE)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function is_admin()
	{
		if ($this->CI->session->userdata('level') == 'administrator')
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function check_logged_in()
	{
		if ($this->CI->session->userdata('logged_in') != TRUE)
		{
            if($this->is_admin())
            {
                redirect('admin/login','refresh');
                exit();
            }
            else
            {
                redirect('user/login', 'refresh');
                exit();
            }
		}
	}

	public function check_access()
	{
		if ($this->CI->session->userdata('level') != 'administrator')
		{
			redirect('user/login', 'refresh');
			exit();
		}
        else
        {
            redirect('admin/login', 'refresh');
			exit();
        }
	}

    function getLastActivity($id)
	{

		$last_activity = $this->CI->auth_model->last_activity($id);

		return $last_activity;
	}

    function process_login($login = NULL)
	{
	    // some security check
	    // we used array variable to check form login

	    if(!isset($login))
			return $this->CI->lang->line('error_field_login');

	    //variable array harus bernilai 2
	    //tidak kurang, tidak lebih
	    if(count($login) != 2)
	    	return $this->CI->lang->line('error_miss_match');

	    $username = $login['username'];
	    $password = $login['password'];

		if(empty($username) && $username == "")
			return $this->CI->lang->line('error_field_username');

		if(empty($password) && $password == "")
			return $this->CI->lang->line('error_field_pass');

		//cek apakah user tersebut ada dalam database
		$user_check = $this->CI->auth_model->check_user($username);

		if($user_check['result'] === TRUE)
		{
			//jika terdaftar
			//cek apakah user tersebut masih aktif
			$isAktifUser = $this->CI->auth_model->check_active_user($user_check['getUserId']);

			if($isAktifUser === TRUE)
			{

				//jika user masih akrtif lakukan check user online
				//check apakah username tersebut sudah login atau sedang online
				$online_check = $this->CI->auth_model->checkOnline($user_check['getUserId']);

				if($online_check === "1")
				{
					$now = time();
					//ambil data waktu akhir
					$old = $this->getLastActivity($user_check['getUserId']);
					//cek apakah waktu lebih atau kurang dari 5 menit
					if(!$this->getDiff($old,$now))
					{
						return $this->CI->lang->line('error_user_online');

					}else{
						//hapus data online dan status online untuk user
						//setelah lebih dari 5 menit;
						$this->CI->auth_model->clear_online($user_check['getUserId']);
						$data = $this->CI->lang->line('error_cleared_online');
						return $data;
					}

				} else {
						//lakukan proses login dan ambil data dari database
						$getUserData = $this->CI->auth_model->exec_login($username,md5($password));

						if(!$getUserData)
						{
							return $this->CI->lang->line('error_user_pass');
						}
						//masukkan data dari database ke dalam variable
						foreach($getUserData as $row):
							$userid = $row['userid'];
							$username = $row['username'];
							$level = $row['levelid'];
							$nama = $row['firstname']." ".$row['lastname'];
							$count = $row['user_logincount'];
							$status_online = 1;
							$count++;
						endforeach;

						//set variable session data
						$now = time();
						$sesData = array(
							'username' => $username,
							'userid' => $userid,
							'level'	=> $level,
							'nama' => $nama,
							'logged_in' => TRUE,
							'login_ke' => $count,
							'login_from' => $this->CI->input->ip_address(),
							'login_time' => $now
						);

						$this->CI->session->set_userdata($sesData);

						$kegiatan = "Login BackEnd CMS by ".$username."(".$nama.") from ".$sesData['login_from'];
						//simpan aktifitas user
						$this->catat($kegiatan);
						//update counter login
						$this->CI->auth_model->update_login_count($userid,$count);
						//masukkan user ke table online
						$this->CI->auth_model->insert_online($userid,$now,$this->CI->session->userdata('session_id'));
						//update status user menjadi online pada table user
						$this->CI->auth_model->change_status_online($userid,$status_online);

						return TRUE;
				}

			} else {

				return $this->CI->lang->line('error_aktive_user');
				exit;

			}

		} else {
			//jika tidak ada munculkan pesan error
			return $this->CI->lang->line('error_user_unknow');
			exit;
		}

	 }


}

/* End of file Access_library.php */
/* Location: ./application/libraries/Access_library.php */
