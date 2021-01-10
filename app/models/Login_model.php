<?php  
    class Login_model
    {
        public function __construct() 
        {
            $this->db = new Database;
        }

        public function getLoginPeserta($data)
        {
            $this->db->query("SELECT * FROM user WHERE username=:username AND password=:password");
            $this->db->bind('username', $data['username']);
            $this->db->bind('password', $data['password']);
            return $this->db->single();
        }
    }
?>