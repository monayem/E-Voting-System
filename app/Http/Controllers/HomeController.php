<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\CandidateEvent;
use App\VoteCollection;
use App\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	public function event(Request $request){
		$events = CandidateEvent::all();
		return view('home.event',['events'=>$events]);
	}

	public function eventDetails(Request $request){
		$id =$request->id;
		$events = CandidateEvent::where(['id'=>$id])->first();
		return view('home.eventDetails',['events'=>$events]);
	}

	public function result(){
		$totalVoter = Voter::count();
		$submittedVote = VoteCollection::count();

    	// $results = DB::table('vote_collections')
     //        ->join('candidates', 'vote_collections.candidateId', '=', 'candidates.id')
     //        ->join('parties', 'candidates.partyName', '=', 'parties.partyName')
     //        ->select('vote_collections.*', 'candidates.*', 'parties.partyLogo')
     //        // ->groupBy('vote_collections.candidateId')
     //        ->orderBy('candidates.totalVote', 'DESC')
     //        ->get();

		$results = DB::table('candidates')
		->join('parties', 'candidates.partyName', '=', 'parties.partyName')
		->select('candidates.*',  'parties.partyLogo')
		->orderBy('candidates.totalVote', 'DESC')
		->get();
		// dd($results);

		return view('home.result', ['results'=>$results,'totalVoter'=>$totalVoter, 'submittedVote'=>$submittedVote]);
	}
}
