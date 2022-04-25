<?php

/**
 * Fichier contenant les fonctionnalités de la table Email.
 */

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * Retourne toutes les données de la table Email.
     */
    public function index()
    {
        return Email::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * Permet d'enregistrer un nouvel email et retourn celui-ci.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        return Email::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     * Permet de voir les détails d'un email en fonction de son id.
     */
    public function show($id)
    {
        return Email::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     * Permet de mettre à jour les données d'un email en fonction de l'id et retourne ses données.
     */
    public function update(Request $request, $id)
    {
        $email = Email::find($id);
        $email->update($request->all());
        return $email;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     * Supprime un email en fonction de l'id
     */
    public function destroy($id)
    {
        return Email::destroy($id);
    }
}
