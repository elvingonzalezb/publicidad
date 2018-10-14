<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_usuarios extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

    public function usuarioLogin($usuario, $password) {
        
        $this->db->select('password');
        $this->db->from('usuarios');
        $this->db->where('usuario', $usuario);
        $hash = $this->db->get()->row('password');
       // print_r($this->verifyPasswordHash($password, $hash));die;
        return $this->verifyPasswordHash($password, $hash);
        
    }

    public function getDatos($user_id){
        $query = $this->db
                    ->select('id,nombre,usuario')
                    ->from('usuarios')
                    ->where('estado', _ACTIVO)
                    ->where('id', $user_id)
                    ->get()
                    ->row_array();
        return $query;
    }

    #--------
    # GET
    #--------
    public function getUsuarioByID($user_id) {
        
        $this->db->from('usuarios');
        $this->db->where('id', $user_id);
        //return $this->db->get()->row();
        return $this->db->get()->row_array();
    }
    public function getUsuarioByName($usuario) {
        
        $query = $this->db
                    ->select('id,nombre,usuario,nivel_id')
                    ->from('usuarios')
                    ->where('usuario', $usuario)
                    ->where('estado', _ACTIVO)
                    ->get()
                    ->row_array();
        return $query;
    }
    public function getUsuarios($nivel_id) {
        
        $query = $this->db
                    ->select('*')
                    ->from('usuarios')
                    ->where('nivel_id', $nivel_id)
                    ->where('estado!=',_ELIMINADO)
                    ->get()
                    ->result_array();
        return $query;
    }

    public function getUsuarioByUser($user_id, $usuario) {
        $query = $this->db
                    ->select('*')
                    ->from('usuarios')
                    ->where('id!=', $user_id)
                    ->where('usuario', $usuario)
                    ->where('estado!=',_ELIMINADO)
                    ->get()
                    ->row_array();
        return $query;
    }

    #--------
    # UPDATE
    #--------
    public function updateUsuario($id, $data) {
        $query = $this->db
                ->where('id', $id)
                ->update('usuarios', $data);
        return $query;
    }
    #--------
    # INSERT
    #--------
    public function saveUsuario($data) {
    //public function saveUsuario($usuario, $nombres, $password) {
        /*$data = array(
            'usuario'   => $usuario,
            'nombre'      => $nombres,
            'password'   => $this->hashPassword($password),
            //'created_at' => date('Y-m-j H:i:s'),
        );*/
        return $this->db->insert('usuarios', $data);
        
    }

    #--------
    # DELETE
    #--------


    public function hashPassword($password) {
        
        return password_hash($password, PASSWORD_BCRYPT);
        
    }

    private function verifyPasswordHash($password, $hash) {
        
        return password_verify($password, $hash);
        
    }

    public function updateClave($id , $nuevoPassword) {
       $data = array(
            'password' => $this->hashPassword($nuevoPassword)
        );
        $query = $this->db
                ->where('id', $id)
                ->update('usuarios', $data);
        return $query;
    }
}
