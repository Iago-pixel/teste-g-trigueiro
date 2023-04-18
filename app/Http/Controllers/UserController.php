<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Complaint;

class UserController extends Controller
{
    public function index() {

        $users = User::all();

        return view('denounce',['users' => $users]);

    }

    public function showDebtor($id) {

        $debtor = User::findOrFail($id);

        $debts = Complaint::where('denouncedId', $id)->get()->toArray();

        return view('showDebtor', ['debtor' => $debtor, 'debts' => $debts]);
    }

    public function debtSettled($id) {
        $debt = Complaint::findOrFail($id);

        $debt->paidOut = true;

        $debt->save();

        return redirect('/admin/home')->with('msg', 'Quitação realizada com sucesso');
    }
}
