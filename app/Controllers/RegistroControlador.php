<?php namespace App\Controllers;

use App\Models\ModeloPersona;

class RegistroControlador extends BaseController {
    
    
    public function index() {

		$usuarios=array("nombre1"=>"Juan","nombre2"=>"Maria");
		return view('vistaRegistro',$usuarios);
	}

	public function registrar(){

		//1.Recibiendo datos desde la vista
		$nombre=$this->request->getPost("nombreUsuario");
		$edad=$this->request->getPost("edadUsuario");
		$cedula=$this->request->getPost("cedulaUsuario");
		$poblacion=$this->request->getPost("poblacionUsuario");
		$descripcion=$this->request->getPost("descripcion");

		//2.Organizar los datos de envio a la base datos en un arreglo asociativo
		$datosEnvio=array(

			"nombre"=>$nombre,
			"edad"=>$edad,
			"cedula"=>$cedula,
			"poblacion"=>$poblacion,
			"descripcion"=>$descripcion

		);

		//3. Sacar una copia de la clase (instanciar la clase) o crear un objeto
		// de la clase ModeloPersona
		$modeloPersona= new ModeloPersona();

		//4. Ejecuto el metodo insert() del objeto cerado en el punto 3
		try{
			$modeloPersona->insert($datosEnvio);
			echo("Registro creado con Éxito");

		}catch(\Exception $e){

			echo($e->getMessage());
		}


	}

	public function consultar(){

		//1. Crear un objeto del modelo
		$modeloPersona= new ModeloPersona();

		//2.Ejecutar la consulta
		try{

			//3. utilizar el metodo findAll() del objeto del modelo
			$usuariosConsultados=$modeloPersona->findAll();

			//4. organizar el resultado en un arreglo asociativo
			// Para poderlo enviar a la vista
			$datosParaVista=array("usuarios"=>$usuariosConsultados);

			//5. Enviar datos a la vista
			return view('vistaListado',$datosParaVista);


		}catch(\Exception $e){
			echo($e->getMessage());
		}

	}

	//--------------------------------------------------------------------

}
