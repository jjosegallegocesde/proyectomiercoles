<?php namespace App\Controllers;

class RegistroControlador extends BaseController {
    
    
    public function index() {

		$usuarios=array("nombre1"=>"Juan","nombre2"=>"Maria");
		return view('vistaRegistro',$usuarios);
	}

	public function registrar(){

		$nombre=$this->request->getPost("nombreUsuario");
		$edad=$this->request->getPost("edadUsuario");
		$cedula=$this->request->getPost("cedulaUsuario");
		$poblacion=$this->request->getPost("poblacionUsuario");
		$descripcion=$this->request->getPost("descripcion");



	}

	//--------------------------------------------------------------------

}
