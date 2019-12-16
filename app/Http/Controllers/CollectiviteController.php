<?php

namespace App\Http\Controllers;

use App\Repositories\CollectiviteRepository;
use Illuminate\Http\Request;

class CollectiviteController extends Controller
{

    protected  $collectiviteRepository;

    public function __construct(CollectiviteRepository $collectiviteRepository){
        $this->collectiviteRepository = $collectiviteRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collectivite = $this->collectiviteRepository->getById(1);
        return view('collectivite.index',compact('collectivite'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collectivite.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collectivite = $this->collectiviteRepository->store($request->all());

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
        $collectivite = $this->collectiviteRepository->getById($id);
        return view('collectivite.edit',compact('collectivite'));
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
        $this->collectiviteRepository->update($id,$request->all());
        return redirect()->route('collectivite.index')
            ->with('flash_message',
                'collectivite'. $request->designation.' updated!');
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
}
