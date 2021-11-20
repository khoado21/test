<?php
class Tintuc_model extends MY_Model
{
    /*
     * Get tintuc by MATINTUC
     */
    function get_tintuc($MATINTUC)
    {
        return $this->db->get_where('tintuc',array('MATINTUC'=>$MATINTUC))->row_array();
    }
        
    /*
     * Get all tintuc
     */
    function get_all_tintuc()
    {
        $this->db->order_by('MATINTUC', 'desc');
        return $this->db->get('tintuc')->result_array();
    }
        
    /*
     * function to add new tintuc
     */
    function add_tintuc($params)
    {
        $this->db->insert('tintuc',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tintuc
     */
    function update_tintuc($MATINTUC,$params)
    {
        $this->db->where('MATINTUC',$MATINTUC);
        return $this->db->update('tintuc',$params);
    }
    
    /*
     * function to delete tintuc
     */
    function delete_tintuc($MATINTUC)
    {
        return $this->db->delete('tintuc',array('MATINTUC'=>$MATINTUC));
    }
}
