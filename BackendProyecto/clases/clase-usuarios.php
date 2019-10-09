<?php
    class Usuarios{
        private $fotoPerfil = 'imgPerfilUsuarios/avatar.png';
        private $nombreUsuario;
        private $correo;
        private $verificacionCorreo;
        private $idUsuarioPersonal;
        private $direccion;
        private $telefono;
        private $contrasenaUsuario;
        private $pais;
        private $fechaNacimiento;
        private $publicacionesFavoritas  = array('IDPublicacion'=>'Soy una publicacion');
        private $empresasFavoritas = array('IDEmpresa'=>'Holasoyuna Empresa');
        private $genero;

        public function __construct(
            $nombreUsuario,
            $correo,
            $verificacionCorreo,
            $idUsuarioPersonal,
            $direccion,
            $telefono,
            $contrasenaUsuario,
            $pais,
            $fechaNacimiento,
            $genero
        ){
        $this->nombreUsuario=$nombreUsuario;
        $this->correo=$correo;
        $this->verificacionCorreo=$verificacionCorreo;
        $this->idUsuarioPersonal=$idUsuarioPersonal;
        $this->direccion=$direccion;
        $this->telefono=$telefono;
        $this->contrasenaUsuario=$contrasenaUsuario;
        $this->pais=$pais;
        $this->fechaNacimiento=$fechaNacimiento;
        $this->genero=$genero;  
        }

        public function setNombreUsuario($nombreUsuario){
        $this->nombreUsuario=$nombreUsuario;
        }
        public function getNombreUsuario(){
        return $this->nombreUsuario;
        }
        public function setFotoPerfil($fotoPerfil){
        $this->fotoPerfil=$fotoPerfil;
        }
        public function getFotoPerfil(){
        return $this->fotoPerfil;
        }
        public function setCorreo($correo){
        $this->correo=$correo;
        }
        public function getCorreo(){
        return $this->correo;
        }
        public function setVerificacionCorreo($verificacionCorreo){
        $this->verificacionCorreo=$nombreUsuario;
        }
        public function getVerificacionCorreo(){
        return $this->verificacionCorreo;
        }
        public function setIdUsuarioPersonal($idUsuarioPersonal){
        $this->idUsuarioPersonal=$idUsuarioPersonal;
        }
        public function getIdUsuarioPersonal(){
        return $this->idUsuarioPersonal;
        }
        public function setDirecccion($direccion){
        $this->direccion=$direccion;
        }
        public function getDireccion(){
        return $this->direccion;
        }
        public function setTelefono($telefono){
        $this->telefono=$telefono;
        }
        public function getTelefono(){
        return $this->telefono;
        }
        public function setContrasenaUsuario(){
            $this->contrasenaUsuario=$contrasenaUsuario;
        }
        public function getContrasenaUsuario($contrasenaUsuario){
            return $this->$contrasenaUsuario;
        }
        public function setPais(){
            $this->pais=$pais;
        }
        public function getPais($pais){
            return $this->$pais;
        }
        public function setFechaNacimiento(){
            $this->fechaNacimiento= $fechaNacimiento;
        }
        public function getFechaNacimiento($fechaNacimiento){
            return $this->fechaNacimiento;
        }
         public function setGenero(){
            $this->genero= $genero;
        }
        public function getGenero($genero){
            return $this->genero;
        }
        
        public function __toString(){
            return json_encode($this->getDatos());
        }
        
        public function crearUsuario($referenciaBD){
            $usuario = $this->getDatos();
            $resultado  = $referenciaBD->getReference('usuarios')
                ->push($usuario);
            if($resultado->getKey() != null){
                return '{"mensaje":"usuario creado","key":"'.$resultado->getKey().'"}';
            }else {
                return '{"mensaje":"usuario no creado"}';
            }
        }

        public function actulizarUsuario($referenciaBD,$id){
            $resultado = $referenciaBD ->getReference('usuarios')
                ->getChild($id)
                ->set($this->getDatos());
              if($resultado->getKey() != null){
                return '{"mensaje":"usuario actualizado","key":"'.$resultado->getKey().'"}';
            }else {
                return '{"mensaje":"usuario no actualizado"}';
            }
        }

        public function getDatos(){
            $usuario['fotoPerfil'] =$this->fotoPerfil;
            $usuario['nombreUsuario'] =$this->nombreUsuario;
            $usuario['correo'] =$this->correo;
            $usuario['verificacionCorreo'] =$this->verificacionCorreo;
            $usuario['idUsuarioPersonal'] =$this->idUsuarioPersonal;
            $usuario['direccion'] =$this->direccion;
            $usuario['telefono'] =$this->telefono;
            $usuario['contrasenaUsuario'] =$this->contrasenaUsuario;
            $usuario['pais'] =$this->pais;
            $usuario['fechaNacimiento'] =$this->fechaNacimiento;
            $usuario['publicacionesFavoritas'] =$this->publicacionesFavoritas;
            $usuario['empresasFavoritas'] =$this->empresasFavoritas;
            $usuario['genero'] =$this->genero;
            return $usuario;
        }
    }

?>