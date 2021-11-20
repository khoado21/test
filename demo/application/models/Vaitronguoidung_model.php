<?php
class Vaitronguoidung_model extends MY_Model
{
    /*
     * Get vaitronguoidung by MAQUYEN
     */
    function get_vaitronguoidung($MAQUYEN)
    {
        return $this->db->get_where('vaitronguoidung',array('MAQUYEN'=>$MAQUYEN))->row_array();
    }
        
    /*
     * Get all vaitronguoidung
     */
    function get_all_vaitronguoidung()
    {
        $this->db->order_by('MAQUYEN', 'desc');
        return $this->db->get('vaitronguoidung')->result_array();
    }
        
    /*
     * function to add new vaitronguoidung
     */
    function add_vaitronguoidung($params)
    {
        $this->db->insert('vaitronguoidung',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update vaitronguoidung
     */
    function update_vaitronguoidung($MAQUYEN,$params)
    {
        $this->db->where('MAQUYEN',$MAQUYEN);
        return $this->db->update('vaitronguoidung',$params);
    }
    
    /*
     * function to delete vaitronguoidung
     */
    function delete_vaitronguoidung($MAQUYEN)
    {
        return $this->db->delete('vaitronguoidung',array('MAQUYEN'=>$MAQUYEN));
    }
}
