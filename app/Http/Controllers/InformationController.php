<?php

namespace App\Http\Controllers;

use App\Repositories\InformationRepsitory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public $informationRepository;

    public function __construct(InformationRepsitory $informationRepsitory){
        $this->informationRepository = $informationRepsitory;
    }
    public function index()
    {
        $informations = $this->informationRepository->getPaginate(30);
        return view('informations.index',compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informations.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'titre' => 'required',
        ]);
        $imageName = time().'.'.request()->photo->getClientOriginalExtension();

        request()->photo->move(public_path('images'), $imageName);
        $request->merge(['image' => $imageName,'user_id' => Auth::id()]);
        $this->informationRepository->store($request->all());
        return back()

            ->with('success','Information ajouté avec sucées');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = $this->informationRepository->getById($id);
        return view('informations.show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = $this->informationRepository->getById($id);
        return view('informations.edit',compact('information'));
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
        request()->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'titre' => 'required',
        ]);
        if($request->photo==null){
            $informtion = $this->informationRepository->getById($id);
            $request->merge(['image'=> $informtion->image,'user_id' => Auth::id()]);
        }else{
            $imageName = time().'.'.request()->photo->getClientOriginalExtension();

            request()->photo->move(public_path('images'), $imageName);
            $request->merge(['image' => $imageName,'user_id' => Auth::id()]);
        }

        $this->informationRepository->update($id,$request->all());
        return redirect()->route('informations.index')->with('success','Information modifier avec sucées');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->informationRepository->destroy($id);
        return redirect()->route('informations.index')
            ->with('succees',
                'Information supprimé!');
    }

    // function for Api

    public function getAllInformationForApi(){
        $informations = $this->informationRepository->getAll();

        return response()->json($informations);
    }

    public function getOneInformation($id){
        $information = $this->informationRepository->getOneInformation($id);
        return response()->json($information);
    }
}
