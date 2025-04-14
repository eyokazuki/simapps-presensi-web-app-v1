<?php
(defined('BASEPATH')) or exit('No direct script access allowed');

class App_header
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    function index()
    {
        header(csrf_name() . ":" . csrf_token());
    }
}
