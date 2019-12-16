<?php

namespace App\Http\Controllers;

use App\Reclamation;
use App\Repositories\ReclamationRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $reclamationRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReclamationRepository $reclamationRepository)
    {
        $this->middleware('auth');
        $this->reclamationRepository = $reclamationRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reclamations = DB::table('reclamations')
            ->join('categories','reclamations.categorie_id','=','categories.id')
            ->select('categories.nom', DB::raw('count(reclamations.id) as reclamation'))
            ->groupBy('categories.nom')
            ->get();
        //dd($reclamations);
        $nombreReclamation = DB::table('reclamations')->count();
        $nombreDuJour = DB::table('reclamations')
            ->whereDate('created_at',Carbon::now()->toDateTime())
            ->count();
        $nombreDeCitoyen = DB::table('citoyens') ->count();
        $nombreActualite = DB::table('informations')->count();
        return view('welcome',compact('nombreReclamation','nombreDuJour','nombreDeCitoyen','nombreActualite','reclamations'));
    }
}
