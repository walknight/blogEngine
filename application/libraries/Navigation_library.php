<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Navigation_library
{
	// Protected or private properties
	protected $_table;

	// Constructor
	public function __construct()
	{
		if (!isset($this->CI))
		{
			$this->CI =& get_instance();
		}

		$this->_table = $this->CI->config->item('database_tables');
	}

	// Public methods
    public function get_nav($parent_id="",$type="main_menu")
    {
        $this->CI->db->select('id,parent_id,title, url, menu_order');

        if($parent_id != "")
        {
            $this->CI->db->where('parent_id',$parent_id);
        } else {
            $this->CI->db->where('parent_id',0);
        }
        $this->CI->db->where('menu_type',$type);
		$this->CI->db->order_by('menu_order', 'ASC');

		$query = $this->CI->db->get($this->_table['navigation']);

		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
    }
}

/* End of file Navigation_library.php */
/* Location: ./application/libraries/Navigation_library.php */
