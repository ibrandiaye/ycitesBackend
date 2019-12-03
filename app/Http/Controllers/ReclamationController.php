<?php

namespace App\Http\Controllers;

use App\Repositories\ReclamationRepository;
use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public $reclamationRepository;

    public function __construct(ReclamationRepository $reclamationRepository){
        $this->reclamationRepository = $reclamationRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $reclamations = $this->reclamationRepository->listeReclamation();
        return view('reclamation.index',compact('reclamations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reclamation = $this->reclamationRepository->store($request->all());
        return response()->json('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reclamation = $this->reclamationRepository->getById($id);
        return view('reclamation.show', compact('reclamation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function valider($id){
        $reclamation = $this->reclamationRepository->getById($id);
        $reclamation->etat= true;
        $reclamation->save();
        return redirect()->back();
    }

    // function for API

    public function getReclamationForCitoyen($id){
        $reclamations = $this->reclamationRepository->listeReclamationForOneCitoyen($id);
        return response()->json($reclamations);
    }
    public function getOneReclamationForCitoyen($id){
        $reclamation = $this->reclamationRepository->oneReclamationForOneCitoyen($id);
        return response()->json($reclamation);
    }

}
