<?php 

	Class Conexion{

		static public function conectar(){

			//parametros PDO ("nameserver;basededatos","usuario","contraseña")
			$link = new PDO("mysql:host=localhost;dbname=cursophp","root","");

			$link ->exec("set names utf8");
			$link ->exec("set lc_time_names = 'es_CO'");

			return $link;
		}



	}
?>