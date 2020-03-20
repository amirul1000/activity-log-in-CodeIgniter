<?php

/**
 * Author: Amirul Momenin
 * Desc:Log Model
 */
class Log_model extends CI_Model
{
	protected $log = 'log';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get log by id
	 *@param $id - primary key to get record
	 *
     */
    function get_log($id){
        $result = $this->db->get_where('log',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all log
	 *
     */
    function get_all_log(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('log')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit log
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_log($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('log')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count log rows
	 *
     */
	function get_count_log(){
       $result = $this->db->from("log")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new log
	 *@param $params - data set to add record
	 *
     */
    function add_log($params){
        $this->db->insert('log',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update log
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_log($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('log',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete log
	 *@param $id - primary key to delete record
	 *
     */
    function delete_log($id){
        $status = $this->db->delete('log',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
