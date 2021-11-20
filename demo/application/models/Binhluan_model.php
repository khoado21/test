<?php
class Binhluan_model extends MY_Model
{
  
    /*
     * Get binhluan by MABINHLUAN
     */
    function get_binhluan($MABINHLUAN)
    {
        return $this->db->get_where('binhluan',array('MABINHLUAN'=>$MABINHLUAN))->row_array();
    }
        
    /*
     * Get all binhluan
     */
    function get_all_binhluan()
    {
        $this->db->order_by('MABINHLUAN', 'desc');
        return $this->db->get('binhluan')->result_array();
    }
        
    /*
     * function to add new binhluan
     */
    function add_binhluan($params)
    {
        $this->db->insert('binhluan',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update binhluan
     */
    function update_binhluan($MABINHLUAN,$params)
    {
        $this->db->where('MABINHLUAN',$MABINHLUAN);
        return $this->db->update('binhluan',$params);
    }
    
    /*
     * function to delete binhluan
     */
    function delete_binhluan($MABINHLUAN)
    {
        return $this->db->delete('binhluan',array('MABINHLUAN'=>$MABINHLUAN));
    }
}
