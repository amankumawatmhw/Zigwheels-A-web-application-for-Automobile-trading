<?php
class DbCon
{
    private $server = 'localhost:3306';
    private $user = 'root';
    private $pwd = '';
    private $db = 'carresellardb';

    private $con = '';

    function connect()
    {
        $this->con = new mysqli($this->server, $this->user, $this->pwd, $this->db);
        if ($this->con->connect_error) {
            die("Error : " .$this->con->connect_error);
        } else {
            return $this->con;
        }
    }
//    function disconnect()
//     {
//         $this->con->close();
//     }
}
