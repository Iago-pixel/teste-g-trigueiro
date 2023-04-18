<?php
  
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;

use App\Models\Complaint;

use App\Models\User;
  
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    } 
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $noPaidComplaints = Complaint::where('paidOut', false)->get()->toArray();

        $debtorsId = [];

        $debtors = [];

        foreach($noPaidComplaints as $noPaid) {

            $denouncedId = $noPaid['denouncedId'];

            $debtorsId[] = $denouncedId;
        }

        $debtorsId = array_unique($debtorsId);

        foreach($debtorsId as $denouncedId) {

            $user = User::findOrFail($denouncedId);

            $debtors[] = $user;
        }

        return view('adminHome',['debtors' => $debtors]);
    }
}
