<?php

/**
 * Fichier contenant les fonctions de la table Certificat.
 */

namespace App\Http\Controllers;

use App\Models\Certificat;
use App\Traits\CertificatTrait;
use Illuminate\Http\Request;

class CertificatController extends Controller
{
    /* /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * Utilisation d'un Trait pour retourner toutes les données de la table Certificat.
     */
    use CertificatTrait;
    public function index()
    {
        return $this->certificat();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * Permet l'enregistrement d'un nouveau certificat et retourne les données enregistré.
     */
    public function store(Request $request)
    {
        $request->validate([
            'projectName' => 'required',
            'type' => 'required',
            'plateform' => 'required',
            'description' => 'required|string',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        return Certificat::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificat  $certificat
     * @return \Illuminate\Http\Response
     * Permet de voir le détails d'un certificat en fonction de l'id.
     */
    public function show($id)
    {
        return Certificat::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificat  $certificat
     * @return \Illuminate\Http\Response
     * Mettre à jour un certificat en fonction de l'id et retourne les nouvelles données.
     */
    public function update(Request $request, $id)
    {
        $certificat = Certificat::find($id);
        $certificat->update($request->all());
        return $certificat;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificat  $certificat
     * @return \Illuminate\Http\Response
     * Supprime le certificat.
     */
    public function destroy($id)
    {
        return Certificat::destroy($id);
    }
}
