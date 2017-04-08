<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class employee_m extends CI_Model {
 
    var $table = 'employee';
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_employees($per_page, $offset, $sortfield, $orderBy, $search_string, $id=0)
	{
		if(empty($id)){
			//echo $per_page.'fff'.$offset.'fff'.$sortfield.'fff'.$orderBy;
			if(!empty($search_string)) {
				$this->db->like('employee_name',$search_string);
				$this->db->or_like('employee_age',$search_string);
				$this->db->or_like('employee_salary',$search_string);
			}
			$this->db->order_by("$sortfield", "$orderBy");
			$this->db->limit($per_page,$offset);
			$query = $this->db->get('employee');
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
			return $data;
		}
		return false;
		} else {
		$query = $this->db->get_where('employee', array('id' => $id));
		return $query->row_array();
		}
	}
    public function record_count($search_string) {
		if(!empty($search_string)) {
			$this->db->like('employee_name',$search_string);
			$this->db->or_like('employee_age',$search_string);
			$this->db->or_like('employee_salary',$search_string);
		}
       return $this->db->count_all_results("employee");
    }
}
