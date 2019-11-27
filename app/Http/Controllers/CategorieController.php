<?php

namespace App\Http\Controllers;

use App\Repositories\CategorieRepository;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    protected $categorieRepository;

    public function __construct(CategorieRepository $categorieRepository){
        $this->categorieRepository = $categorieRepository;

        $this->middleware(['auth'])->except('getAllCategorie');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categorieRepository->getPaginate(30);
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom'=>'required',

        ]);
        $categorie = $this->categorieRepository->store($request->all());
        return redirect()->route('categories.index')
            ->with('flash_message',
                'Categorie: '.$categorie->nom.' ajouté Avec Succéss.');

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
        $categorie = $this->categorieRepository->getById($id);
        return view('categories.edit', compact('categorie'));
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
        $this->validate($request, [
            'nom'=>'required',
        ]);
        $this->categorieRepository->update($id,$request->all());
        return redirect()->route('categories.index')
            ->with('flash_message',
                'Permission'. $request->nom.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categorieRepository->destroy($id);
        return redirect()->route('categories.index')
            ->with('flash_message',
                'Categorie supprimé!');

    }

    //functio for API

    public function getAllCategorie(){
        $categories = $this->categorieRepository->getAll();
        return response()->json($categories);
    }
}
