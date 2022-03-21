<?php
class M_kontak extends CI_Model
{
    public function getContact()
    {
        $query = $this->db->get('contact');
        return $query;
    }
}
