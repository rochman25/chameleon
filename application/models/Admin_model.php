<?php

class Admin_model extends MY_Model
{
    protected $table = "admin";

    function __construct()
    {
        parent::__construct();
    }

    function login($email){
        $this->getWhere('email',$email);
        return $this->getData()->row();
    }

}
