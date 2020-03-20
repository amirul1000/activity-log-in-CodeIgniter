<?php

/**
 * Author: Amirul Momenin
 * Desc:Bookings Model
 */
class Bookings_model extends CI_Model
{

    protected $bookings = 'bookings';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get bookings by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_bookings($id)
    {
        $result = $this->db->get_where('bookings', array(
            'id' => $id
        ))->row_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all bookings
     */
    function get_all_bookings()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('bookings')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit bookings
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_bookings($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('bookings')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count bookings rows
     */
    function get_count_bookings()
    {
        $result = $this->db->from("bookings")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new bookings
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_bookings($params)
    {
        $this->db->insert('bookings', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update bookings
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_bookings($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('bookings', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete bookings
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_bookings($id)
    {
        $status = $this->db->delete('bookings', array(
            'id' => $id
        ));
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }
}
