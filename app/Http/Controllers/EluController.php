<?php

namespace App\Http\Controllers;

use App\Repositories\EluRepository;
use Illuminate\Http\Request;

class EluController extends Controller
{

    protected $eluRepository;
    public function __construct(EluRepository $eluRepository){
        $this->eluRepository = $eluRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elu = $this->eluRepository->getAll();
        return view('elu.liste');

    }
   public function getElu(){
       $elu = $this->eluRepository->getAll();
       return view('elu.add');
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('elu.add');
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if($request->image!=null){

            $imageName = time().'.'.request()->image->getClientOriginalExtension();

            request()->image->move(public_path('elu'), $imageName);
            $request->merge(['photo' => $imageName]);
        }
        $this->eluRepository->store($request->all());
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
        $elu = $this->eluRepository->getById(1);
        return view('elu.liste', compact('elu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $elu = $this->eluRepository->getById($id);
        return view('elu.edit', compact('elu'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if($request->image==null){
            $elu = $this->eluRepository->getById($id);
            $request->merge(['image'=> $elu->photo]);
        }else{
            $imageName = time().'.'.request()->image->getClientOriginalExtension();

            request()->image->move(public_path('elu'), $imageName);
            $request->merge(['photo' => $imageName]);
        }

        $this->eluRepository->update($id,$request->all());
        return redirect()->route('elu.show',[$id])->with('success','Information modifier avec sucées');

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

    public function getEluApi(){
        $elu = $this->eluRepository->getById(1);
        return response()->json($elu);
    }
}
