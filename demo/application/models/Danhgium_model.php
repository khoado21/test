<?php

class Danhgium_model extends MY_Model
{

    /*
     * Get danhgium by MADANHGIA
     */
    function get_danhgium($MADANHGIA)
    {
        return $this->db->get_where('danhgia',array('MADANHGIA'=>$MADANHGIA))->row_array();
    }
        
    /*
     * Get all danhgia
     */
    function get_all_danhgia()
    {
        $this->db->order_by('MADANHGIA', 'desc');
        return $this->db->get('danhgia')->result_array();
    }
        
    /*
     * function to add new danhgium
     */
    function add_danhgium($params)
    {
        $this->db->insert('danhgia',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update danhgium
     */
    function update_danhgium($MADANHGIA,$params)
    {
        $this->db->where('MADANHGIA',$MADANHGIA);
        return $this->db->update('danhgia',$params);
    }
    
    /*
     * function to delete danhgium
     */
    function delete_danhgium($MADANHGIA)
    {
        return $this->db->delete('danhgia',array('MADANHGIA'=>$MADANHGIA));
    }
}
