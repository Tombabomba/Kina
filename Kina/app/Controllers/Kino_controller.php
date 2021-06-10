<?php namespace App\Controllers;

use \App\Models\Kino_model;
use \App\Models\Nazev_model;

class Kino_controller extends BaseController
{
	public function home()
 {
	$this->ionAuth = new \IonAuth\Libraries\IonAuth(); 

	if ( $this->ionAuth->loggedIn() ) {

			echo view('layout/header_loggedIn');
			echo view('content/home');
			echo view('layout/footer');
		}
	else 

	echo view('layout/header');
	echo view('content/home');
	echo view('layout/footer');

}

public function form()
{

	helper(['form', 'url']);

	$this->ionAuth = new \IonAuth\Libraries\IonAuth(); 

	if ( $this->ionAuth->loggedIn() ) {

		$error = $this->validate([
			'nazev_filmu'	=>	'required',
			'jazyk'			=>	'required',
			'delka'			=>	'required'
		]);
		
		if(!$error)
		{
			echo view('layout/header_loggedIn');
			echo view('content/form', ['error' 	=> $this->validator]);
			echo view('layout/footer');
		}
		else{
			
			$db = db_connect();
			$kino_model = new Kino_model($db);

			$kino_model->save(
				$d = $this->request->getVar('delka'),
				$z = $this->request->getVar('druh'),
				$t = $this->request->getVar('typ'),
				$n = $this->request->getVar('nazev_filmu'),
				$j = $this->request->getVar('jazyk'),
				$na = $this->request->getVar('nazev_alt'),
				$ja = $this->request->getVar('jazyk_alt'),
			);

			echo view('layout/header_loggedIn');
			echo view('content/form');
			echo view('layout/footer');
		}
	}
	else 
		
	
	throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        
    }


	public function edit()
	{
	   $this->ionAuth = new \IonAuth\Libraries\IonAuth(); 
	   
		$db = db_connect();
	   $kino_model = new Kino_model($db);
   
	   if ( $this->ionAuth->loggedIn() ) {


				$data['edit'] = $kino_model->getFilms();
				
			   echo view('layout/header_loggedIn');
			   echo view('content/edit', $data);
			   echo view('layout/footer');
		   }
	   else 
   
	   throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
   
   }


   
	public function edit_film($id_filmu)
	{
	   $this->ionAuth = new \IonAuth\Libraries\IonAuth(); 
	   
		$db = db_connect();
	   $kino_model = new Kino_model($db);
   
	   if ( $this->ionAuth->loggedIn() ) {

				$data['edit_film'] = $kino_model->getFilm($id_filmu);
				$data['edit_film_og'] = $kino_model->getFilmOG($id_filmu);
				$data['edit'] = $kino_model->getFilms();

				$error = $this->validate([
					'nazev_filmu'	=>	'required',
					'jazyk'			=>	'required',
					'delka'			=>	'required'
				]);
				
				if(!$error)
				{
					echo view('layout/header_loggedIn');
					echo view('content/edit_film', $data, ['error' 	=> $this->validator]);
					echo view('layout/footer');

				}
				else{
	   
				   $kino_model->edit_update(
						$id_filmu,
						$in = $this->request->getVar('id_nazev'),
						$d = $this->request->getVar('delka'),
						$z = $this->request->getVar('druh'),
						$t = $this->request->getVar('typ'),
						$n = $this->request->getVar('nazev_filmu'),
						$j = $this->request->getVar('jazyk'),
						$na = $this->request->getVar('nazev_alt'),
						$ja = $this->request->getVar('jazyk_alt'),
				   );
				   	
				 	  echo view('layout/header_loggedIn');
					echo view('content/edit', $data);
					echo view('layout/footer');
				}
		   }
	   else 
   
	   throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
   
   }

   public function delete_film($id_filmu, $in){
	$db = db_connect();
	
	$kino_model = new Kino_model($db);
	
	$data['edit'] = $kino_model->getFilms();

	$kino_model->delete_film($id_filmu, $in);

	echo view('layout/header_loggedIn');
	echo view('content/edit', $data);
	echo view('layout/footer');

   }
}

