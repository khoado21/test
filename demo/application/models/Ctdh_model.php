<?php
class Ctdh_model extends MY_Model
{

    /*
     * Get ctdh by MASP
     */
    function get_ctdh($MASP)
    {
        return $this->db->get_where('ctdh',array('MASP'=>$MASP))->row_array();
    }
        
    /*
     * Get all ctdh
     */
    function get_all_ctdh()
    {
        $this->db->order_by('MASP', 'desc');
        return $this->db->get('ctdh')->result_array();
    }
        
    /*
     * function to add new ctdh
     */
    function add_ctdh($params)
    {
        $this->db->insert('ctdh',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update ctdh
     */
    function update_ctdh($MASP,$params)
    {
        $this->db->where('MASP',$MASP);
        return $this->db->update('ctdh',$params);
    }
    
    /*
     * function to delete ctdh
     */
    function delete_ctdh($MASP)
    {
        return $this->db->delete('ctdh',array('MASP'=>$MASP));
    }
}
