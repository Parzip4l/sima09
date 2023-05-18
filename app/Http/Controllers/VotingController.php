<?php

namespace App\Http\Controllers;

use App\Voting;
use App\Vote;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VotingController extends Controller
{

    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $votingdata = Voting::all()->take(10);
                return view('pages.voting.index', compact('votingdata'));
            }else{
                $votingdata = Voting::all()->take(10);
                $count = count($votingdata);
                return view('pages.voting.indexwarga', compact('votingdata','count'));
            }
        }
    }

    public function create()
    {
        return view('pages.voting.create');
    }

    public function tempatvote()
    {
        return view('pages.voting.vote');
    }

    public function result($id)
    {
        $voting = Voting::findOrFail($id);
        $result = json_decode($voting->result, true);

        $data = [];

        foreach ($result as $option => $count) {
            $data[] = [
                'label' => $option,
                'value' => $count
            ];
        }

        return view('voting.result', compact('voting', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'options' => 'required|array|min:2',
            'end_date' => 'required|date|after_or_equal:now',
        ]);
    
        $voting = new Voting;
        $voting->title = $request->title;
        $voting->deskripsi = $request->deskripsi;
        $voting->options = $request->options;
        $voting->end_date = $request->end_date;
        $voting->save();
    
        return redirect()->route('voting.index')->with('success', 'Voting berhasil dibuat.');
    }

    public function vote(Request $request, Voting $voting)
    {
        $request->validate([
            'option' => 'required|in:' . implode(',', $voting->options),
        ]);

        $voters = $voting->voters ? json_decode($voting->voters, true) : [];
        $voter = $request->nik;
        

        if (in_array($voter, $voters)) {
            return redirect()->back()->with('error', 'Anda sudah melakukan vote.');
        }

        $result = $voting->result ?? [];

        $option = $request->option;

        if (is_string($result)) {
            $result = json_decode($result, true);
        }

        if (!isset($result[$option])) {
            $result[$option] = 0;
        }

        $result[$option]++;

        $voters[] = $voter;

        $voting->voters = $voters ? json_encode($voters) : '';
        $voting->result = $result;

        $voting->save();


        return redirect()->route('voting.vote', $voting->id)->with('success', 'Terima kasih atas partisipasi Anda.');
    }

    public function show(Voting $voting)
    {

        if($user = Auth::user()){
            if($user->level == '1'){
                $options = $voting->options;
                $voters = $voting->voters ?? [];
                $result = $voting->result ?? [];
            
                // Convert $result to an array if it is a string
                if (is_string($result)) {
                    $result = json_decode($result, true);
                }
            
                // Get the keys and values of the $result array
                $resultKeys = array_keys($result);
                $resultValues = array_values($result);
            
                return view('pages.voting.show', compact('voting', 'options', 'voters', 'resultKeys', 'resultValues'));
            }else{
                return view('pages.voting.vote', compact('voting'));
            }
        }
    }
}
