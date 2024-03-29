<?php

namespace App\Http\Controllers;

use App\Repositories\CitoyenRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitoyenController extends Controller
{
    protected $citoyenRepository;
    public function __construct(CitoyenRepository $citoyenRepository){
        $this->citoyenRepository = $citoyenRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function  getByType($type){
        $citoyen = DB::table('citoyens')
            ->where('type',$type)
            ->first();
        return view('citoyen.index',compact('citoyen','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citoyen.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $citoyen  = $this->citoyenRepository->store($request->all());
        return  redirect()->route('collectivite.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $citoyen = $this->citoyenRepository->getById($id);
        return view('citoyen.edit',compact('citoyen'));
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
        $this->citoyenRepository->update($id,$request->all());
        return redirect()->route('citoyen.type',[$request->type])
            ->with('flash_message',
                'personne '. $request->prenom.' '.  $request->nom.' modifié!');
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

    public function storeApi(Request $request)
    {
        $citoyen  = $this->citoyenRepository->store($request->all());
        return response()->json($citoyen);
    }
}
