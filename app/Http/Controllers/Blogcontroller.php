<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFlitrerRequest;
use Illuminate\Http\Request;
use \App\Models\Employe;
use App\Models\Service;

class Blogcontroller extends Controller
{
    //
    public function addemploye()
    {
        return view('blog.addemploye');
    }
    public function addservice()
    {
        return view('blog.addservice');
    }
    public function addemployetodatabase(Request $request)
    {
        $post = Employe::create([
            'nom' => $request->input('names'),
            'prenom' => $request->input('surname'),
            'mail_employe' => $request->input('mail'),
            'id_service' => $request->input('idservice')
        ]);

        return redirect()->route('blogaddemploye')->with('success', "L'employé a bien été sauvegardé");
    }
    public function addservicetodatabase(Request $request)
    {
        $post = Service::create([
            'libelle_service' => $request->input('servicename'),
        ]);
        return redirect()->route('blogaddservice')->with('success', "Le service a bien été sauvegardé");
    }
    public function findService()
    {
        $service = Service::all();
        return view('blog.addemploye', compact('service'));
    }

    public function employelist()
    {
        $list = Employe::with('service')->get();
        return view('blog.employelist', compact('list'));
    }
    public function findServices()
    {
        $service = Service::all();
        return view('blog.servicelist', compact('service'));
    }
    public function suppemploye($id)
    {
        $employer = Employe::find($id);
        if ($employer) {
            $employer->delete();
            return redirect()->back()->with('success', 'Employer supprimé avec succès');
        }
    }
    public function blogsuppresionservice($id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->delete();
            return redirect()->back()->with('success', 'Service Supprimé avec succès');
        }
    }

    public function modservice($id) {
        $service = Service::find($id);
        if ($service) {
            return view('blog.modservice', compact('service'));
        }
    }

    public function modserviceupdate(Request $request, $id_service) {
        $request->validate([
            'servicename'=>'required|string|max:255',
        ]);
        $service = Service::find($id_service);
        if($service){
           $service->libelle_service = $request->input('servicename');
        $service->save();
        return redirect()->route('bloglistdesservice')->with('servicemodifier', 'Service modifier avec succès'); 
        }
        elseif(!$service){
            return view('errors.pagenotfound');
        }
        
    }


    public function modemploye($id, $id_service)
    {
        $employeamodif = Employe::where('id_employe', $id)->first();
        $service = Service::where('id_service', $id_service)->first();
        $allservice = Service::all();
        if ($employeamodif && $service) {
            return view('blog.modemploye', compact('employeamodif', 'service', 'allservice'));
        } else {
            return view('errors.pagenotfound');
        }
    }
    
    public function modemployeupdate(Request $request, $id_employe, $id_service)
    {
        // Validation des données
        $request->validate([
            'names' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'mail' => 'required|email|max:255',
            'idservice' => 'required|integer',
        ]);

        // Récupérer l'employé par son ID
        $employe = Employe::find($id_employe);
        if (!$employe) {
            return view('errors.pagenotfound');
        }

        // Mise à jour des champs
        $employe->nom = $request->input('names');
        $employe->prenom = $request->input('surname');
        $employe->mail_employe = $request->input('mail'); // Assurez-vous que cette colonne existe dans la DB
        $employe->id_service = $request->input('idservice');

        // Sauvegarder les changements
        $employe->save();

        return redirect()->route('bloglistedesemploye')->with('employermodifier', 'Employé modifié avec succès');
    }
}
