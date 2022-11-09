<?php

namespace App\dao;
use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;

class ServiceEmploye
{
    public function ajoutEmploye($civilite, $prenom, $nom, $pwd, $profil, $interet, $messsage)
    {
        try {
            DB::table('employe')->insert(
                ['civilite' => $civilite, 'nom' => $nom,
                    'prenom' => $prenom, 'pwd' => $pwd,
                    'profil' => $profil, 'interet' => $interet,
                    'message' => $messsage]);
        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getListeEmployes()
    {
        try {
            $mesEmployes = DB::table('employe')
                ->select()
                ->get();
            return $mesEmployes;
        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getEmploye($id)
    {
        try {
            $unemploye = DB::table('employe')
                ->select()
                ->where('numEmp', '=', $id)
                ->first();
            return $unemploye;
        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function modificationEmploye($code, $civilite, $prenom, $nom, $pwd, $profil, $interet, $messsage){
        try {
            DB::table('employe')
                ->where ('numEmp', $code)
                ->update( ['civilite' => $civilite, 'nom' => $nom,
                    'prenom' => $prenom, 'pwd' => $pwd,
                    'profil' => $profil, 'interet' => $interet,
                    'message' => $messsage]);
        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
    public function getUnEmploye($id)
    {
        try {
            $mesEmployes = DB::table('employe')
                ->select()
                ->where('numEmp', '=', $id)
                ->first();
            return $mesEmployes;
        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
