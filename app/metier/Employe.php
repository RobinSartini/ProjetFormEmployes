<?php

namespace App\metier;

    use Illuminate\Support\Facades\Sessio;
    use Illuminate\Database\Eloquent\Model;
    use DB;

class Employe extends Model{
    protected  $table= 'employe';
    public $timestamps = false;
    protected $fillable= [
        'numEmp',
        'civilite',
        'prenom',
        'nom',
        'pwd',
        'profil',
        'interet',
        'message'
    ];
}
