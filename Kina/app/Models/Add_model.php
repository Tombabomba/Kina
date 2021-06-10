<?php

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{
	
	protected $table = 'filmy';
	protected $primaryKey = 'id_filmy';
	protected $allowedFields = ['delka'];

}

?>