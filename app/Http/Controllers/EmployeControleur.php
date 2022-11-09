<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input\Http;
use Request;
use App\Metier\Employe;
use App\dao\ServiceEmploye;
use App\Exceptions\MonException;

class EmployeControleur extends Controller
{
    public function postAjouterEmploye()
    {
        try {
            $civilite = Request::input("civilite");
            $prenom = Request::input("prenom");
            $nom = Request::input("nom");
            $pwd = Request::input("passe");
            $profil = Request::input("profil");
            $interet = Request::input("interet");
            $message = Request::input("le-message");

            $unEmployeService = new ServiceEmploye();
            $unEmployeService->ajoutEmploye($civilite, $prenom, $nom, $pwd, $profil, $interet, $message);

            return view("home");
        } catch (MonExecption $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (\Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }

    }

    public function listerEmployes()
    {
        $unEmployeService = new ServiceEmploye();
        try {
            $mesEmployes = $unEmployeService->getListeEmployes();
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
        return view('vues/formEmployeLister', compact('mesEmployes'));
    }

    public function modifier($id)
    {
        try {
            $unEmployeService = new ServiceEmploye();
            $unEmploye = $unEmployeService->getEmploye($id);
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (\Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
        return view('vues/formEmployeModifier', compact('unEmploye'));
    }

    public function postmodificationEmploye($id = null)
    {
        $code=$id;
        $civilite = Request::input("civilite");
        $nom = Request::input("nom");
        $prenom = Request::input("prenom");
        $pwd = Request::input("passe");
        $profil = Request::input("profil");
        $interet = Request::input("interet");
        $message = Request::input("le-message");

        try {
            $unEmployeService = new ServiceEmploye();
            $unEmployeService->modificationEmploye($code, $civilite, $prenom, $nom, $pwd, $profil, $interet, $message);
            return view("home");
        } catch (MonExecption $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (\Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }

    }
    public function rechercherEmploye()
    {
        $unEmployeService = new ServiceEmploye();
        try {
            $mesEmployes = $unEmployeService->getListeEmployes();
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
        return view('vues/EmployeRechercher', compact('mesEmployes'));
    }
    public function afficherUnEmploye()
    {
        $id = Request::input("cbEmployes");
        try {
            $unEmploye = new ServiceEmploye();
            $monEmploye = $unEmploye->getUnEmploye($id);
            return view('vues/formEmployeRechercher', compact('monEmploye'));
        } catch (MonExecption $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (\Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }


    }
}
