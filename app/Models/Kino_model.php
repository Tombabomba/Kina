<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class Kino_model
{
	
    protected $db;
    public function __construct(ConnectionInterface &$db){
        $this->db =& $db;
    }


    function getFilms()
    {
       $builder= $this->db->table('filmy');
        $builder->select('*');
        $builder->join('zanr', 'zanr.id_zanr = filmy.id_zanr');
        $builder->join('typ', 'typ.id_typ = filmy.id_typ');
        $builder->join('nazev_filmu', 'nazev_filmu.id_filmu = filmy.id_filmy');
        $builder->join('nazev', 'nazev_filmu.id_jazyku = nazev.id_jazyk');
        $builder->where('originalni', 1);

       $films =  $builder->get()->getResult();
       return $films;
    }


    function getFilm($id_filmu)
    {
       $builder= $this->db->table('filmy');
        $builder->select('*');
        $builder->join('zanr', 'zanr.id_zanr = filmy.id_zanr');
        $builder->join('typ', 'typ.id_typ = filmy.id_typ');
        $builder->join('nazev_filmu', 'nazev_filmu.id_filmu = filmy.id_filmy');
        $builder->join('nazev', 'nazev_filmu.id_jazyku = nazev.id_jazyk');
        $builder->where('id_filmy', $id_filmu);
        $builder->where('originalni', 0);
       
        $films =  $builder->get()->getResult();
       return $films;
    }

    
    function getFilmOg($id_filmu)
    {
       $builder= $this->db->table('filmy');
        $builder->select('*');
        $builder->join('zanr', 'zanr.id_zanr = filmy.id_zanr');
        $builder->join('typ', 'typ.id_typ = filmy.id_typ');
        $builder->join('nazev_filmu', 'nazev_filmu.id_filmu = filmy.id_filmy');
        $builder->join('nazev', 'nazev_filmu.id_jazyku = nazev.id_jazyk');
        $builder->where('id_filmy', $id_filmu);
        $builder->where('originalni', 1);
       
        $films =  $builder->get()->getResult();
       return $films;
    }


    function save($d, $z, $t, $n, $j, $na, $ja)
    {
        $filmy_id=0;
        $nazev_id=0;
        
        $filmy= $this->db->table('filmy');
        $nazev= $this->db->table('nazev');
        $nazev_filmu= $this->db->table('nazev_filmu');

        $filmy->set('delka', $d);
        $filmy->set('id_typ', $t);
        $filmy->set('id_zanr', $z);
        $filmy->insert(); 
        $filmy_id = $this->db->insertID();

        $nazev->set('nazev', $n);
        $nazev->set('jazyk', $j);
        $nazev->set('originalni', 1);
        $nazev->insert();
        $nazev_id = $this->db->insertID();

        $nazev_filmu->set('id_jazyku', $nazev_id);
        $nazev_filmu->set('id_filmu', $filmy_id);
        $nazev_filmu->insert();

        if($na != null)
        {
            $nazev->set('nazev', $na);
            $nazev->set('jazyk', $ja);
            $nazev->set('originalni', 0);
            $nazev->insert();
            $nazev_id = $this->db->insertID();
    
            $nazev_filmu->set('id_jazyku', $nazev_id);
            $nazev_filmu->set('id_filmu', $filmy_id);
            $nazev_filmu->insert();
        }
    }

    function edit_update($id_filmu, $in, $d, $z, $t, $n, $j, $na, $ja){
        
    
        $filmy= $this->db->table('filmy');
        $nazev= $this->db->table('nazev');
        $nazev_filmu= $this->db->table('nazev_filmu');
        $builder= $this->db->table('filmy');

        $filmy->set('delka', $d);
        $filmy->set('id_typ', $t);
        $filmy->set('id_zanr', $z);
        $filmy->where('id_filmy', $id_filmu);
        $filmy->update(); 
        
        $nazev->set('nazev', $n);
        $nazev->set('jazyk', $j);
        $nazev->where('id_jazyk', $in);
        $nazev->update();

        $nazev_filmu->set('id_jazyku', $in);
        $nazev_filmu->set('id_filmu', $id_filmu);
        $nazev_filmu->where('id_filmu', $id_filmu);
        $nazev_filmu->where('id_jazyku', $in);
        $nazev_filmu->update();

        if($na != null)
        {
            $nazev->set('nazev', $na);
            $nazev->set('jazyk', $ja);
            $nazev->where('id_jazyk', $in);
            $nazev->update();
            $nazev_id = $this->db->insertID();
    
            $nazev_filmu->set('id_jazyku', $in);
            $nazev_filmu->set('id_filmu', $id_filmu);
            $nazev_filmu->where('id_filmu', $id_filmu);
            $nazev_filmu->where('id_jazyku', $in);
            $nazev_filmu->update();
        } 
    
    }
    
    function delete_film($id_filmu, $in)
    {
        $filmy= $this->db->table('filmy');
        $nazev= $this->db->table('nazev');
        $nazev_filmu= $this->db->table('nazev_filmu');
    
        $filmy->where('id_filmy', $id_filmu);
        $filmy->delete();

        $nazev->where('id_jazyk', $in);
        $nazev->delete();

        $nazev_filmu->where('id_filmu', $id_filmu);    
        $nazev_filmu->delete();             
    }
}