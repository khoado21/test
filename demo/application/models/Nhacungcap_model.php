<?php
class Nhacungcap_model extends MY_Model
{
    /*
     * Get nhacungcap by MANCC
     */
    function get_nhacungcap($MANCC)
    {
        return $this->db->get_where('nhacungcap',array('MANCC'=>$MANCC))->row_array();
    }
        
    /*
     * Get all nhacungcap
     */
    function get_all_nhacungcap()
    {
        $this->db->order_by('MANCC', 'desc');
        return $this->db->get('nhacungcap')->result_array();
    }
        
    /*
     * function to add new nhacungcap
     */
    function add_nhacungcap($params)
    {
        $this->db->insert('nhacungcap',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update nhacungcap
     */
    function update_nhacungcap($MANCC,$params)
    {
        $this->db->where('MANCC',$MANCC);
        return $this->db->update('nhacungcap',$params);
    }
    
    /*
     * function to delete nhacungcap
     */
    function delete_nhacungcap($MANCC)
    {
        return $this->db->delete('nhacungcap',array('MANCC'=>$MANCC));
    }
}
