<?php
class Layouts{
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
    
    function utama($content, $data = NULL){
        $data['contentnya'] = $this->_ci->load->view($content, $data, TRUE);
        $data['footernya'] = $this->_ci->load->view('Layout/footer', $data, TRUE);
        
        $this->_ci->load->view('v_halamanAwal', $data);
    }
}