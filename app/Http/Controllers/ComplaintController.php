<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Complaint;

use App\Models\User;

class ComplaintController extends Controller
{
    public function index() {

        $seeList = request('seeList');

        $noPaidComplaints = Complaint::where('paidOut', false)->get()->toArray();

        $debtors = [];

        $debtorsWithSoda = [];

        foreach($noPaidComplaints as $noPaid) {

            $denouncedId = $noPaid['denouncedId'];

            $user = User::findOrFail($denouncedId);

            $userName = $user->name;

            if (array_key_exists($userName, $debtors)) {
                $debtors[$userName][] = $noPaid;
            } else {
                $debtors[$userName] = [$noPaid];
            }

            if ($noPaid['soda']) {
                if (array_key_exists($userName, $debtorsWithSoda)) {
                    $debtorsWithSoda[$userName][] = $noPaid;
                } else {
                    $debtorsWithSoda[$userName] = [$noPaid];
                }
            }
        }

        return view('welcome',['debtors' => $debtors,'debtorsWithSoda' => $debtorsWithSoda ,'seeList' => $seeList]);

    }

    public function create($userId) {

        $user = User::findOrFail($userId);

        return view('complaints.create',['userId' => $userId, 'user' => $user]);
    }

    public function store($userId, Request $request) {

        $complaint = new Complaint;

        if($request->observation) {
            $complaint->observation = $request->observation;
        } else {
            $complaint->observation = "";
        }

        $debts = Complaint::where('denouncedId', $userId)->get()->toArray();

        $currentMonth = date('m/Y');

        $noPaidsCount = 0;

        foreach($debts as $debt) {

            $timestamps = strtotime($debt['created_at']);

            $month = date('m/Y', $timestamps);

            if($month == $currentMonth) {
                $noPaidsCount = $noPaidsCount + 1;
            }
        }

        $complaint->soda = false;

        if($noPaidsCount > 1) {
            $complaint->soda = true;
        }

        $complaint->paidOut = false;

        $complaint->denouncedId = $userId;

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;

            $requestImage->move(public_path('img/complaint'), $imageName);

            $complaint->image = $imageName;
        }
        
        $complaint->save();

        return redirect('/')->with('msg', 'Denúncia realizada com sucesso');
    }

    public function show($id) {

        $complaint = Complaint::findOrFail($id);

        return view('complaint.show',['complaint' => $complaint]);
    }
}
