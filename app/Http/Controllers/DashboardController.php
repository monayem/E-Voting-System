<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\CandidateEvent;
use App\VoteCollection;
use App\VoteEvent;
use App\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class DashboardController extends Controller
{
    public function giveVote(Request $request){
        date_default_timezone_set('Asia/Dhaka');
        $timezone = date_default_timezone_get();
        $votedTime = date('h:i:s a', time());
        $votedDate = date('Y-m-d');
        
        $candidateId = $request->get('id');
        $candidateInfo = Candidate::find($candidateId);

        $voterId = Session::get('id');
        $vote = new VoteCollection;
        $vote->voterId = $voterId;
        $vote->candidateId = $candidateId;
        $vote->votedTime = $votedTime;
        $vote->votedDate = $votedDate;
        $vote->save();

        $candidateInfo->totalVote = $candidateInfo->totalVote+1;
        $candidateInfo->save();

        Session::flash('message', 'Vote Subbmitted Successfully'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->route('dashboard',['type'=>'voter']);
        
    }

    public function updateEvent(Request $request){
        $event = CandidateEvent::find($request->id);
        $event->eventName = $request->eventName;
        $event->eventDescription =$request->eventDescription;
        $event->save(); 
    }

    public function deleteEvent(Request $request){
        $event = CandidateEvent::find($request->eventId);
        $event->delete(); 
    }

    public function dashboard(Request $request)
    {
        $votedDate = date('Y-m-d');
        $voteGiven = VoteCollection::where('voterId',Session::get('id'))->first();
        $voteEvent = VoteEvent::where(['electionDate'=>$votedDate])->first();
        return view('voter.dashboard', ['voteGiven'=>$voteGiven, 'voteEvent'=>$voteEvent]);
    }

    public function createEvent(Request $request)
    {
        return view('candidate.createEvent');
    }

    public function votePage(Request $request)
    {
        $voteGiven = VoteCollection::where('voterId',Session::get('id'))->first();
        if($voteGiven==''){
            $candidates = DB::table('candidates')
            ->join('parties', 'candidates.partyName', '=', 'parties.partyName')
            ->select('candidates.*', 'parties.partyLogo')
            ->get();
            $voteGiven = VoteCollection::find(Session::get('id'));
            $votedDate = date('Y-m-d');
            $voteEvent = VoteEvent::where(['electionDate'=>$votedDate])->first();
            return view('voter.votePage', ['candidates'=>$candidates, 'voteGiven'=>$voteGiven, 'voteEvent'=>$voteEvent]);
        }
        else{
            Session::flash('message', 'You have already Given Your vote!!!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->route('dashboard',['type'=>'voter']);
        }
    }

    public function storeEvent(Request $request){

        $validatedData = $request->validate([
            'eventName'=> 'required',
            'eventDate'=> 'required',
            'eventBanner'=> 'required',

        ]);

        $name = "";
        if ($request->hasFile('eventBanner')) {


            $image = $request->file('eventBanner');
            $name = time().'_'.$image->getClientOriginalName();
            $destinationPath = public_path('/eventImages');
            $image->move($destinationPath, $name);

        }

        // $events = new Event();
        $events = new CandidateEvent;
        $events->candidateId = Session::get('id');
        $events->eventName = $request->eventName;
        $events->eventDescription = $request->eventDescription;
        $events->eventDate = $request->eventDate;
        $events->eventBanner = $name;
        $events->save();
        Session::flash('message', 'Event Created Successfully'); 
        Session::flash('alert-class', 'alert-success'); 

        return redirect()->route('createEvent');

    }

    public function eventList(Request $request)
    {
        if(Session::get('role')=='Voter'){
            $voteGiven = VoteCollection::where('voterId',Session::get('id'))->first();
            $eventList = CandidateEvent::orderBy('id','desc')->paginate(1);
            $votedDate = date('Y-m-d');
            $voteEvent = VoteEvent::where(['electionDate'=>$votedDate])->first();
            return view('candidate.eventList',['eventList'=>$eventList, 'voteGiven'=>$voteGiven, 'voteEvent'=>$voteEvent]);
        }
        $eventList = CandidateEvent::where(['candidateId'=>Session::get('id')])->paginate(1);

        return view('candidate.eventList',['eventList'=>$eventList]);
    }

    public function candidateProfile(Request $request)
    {
        $candidate = Candidate::where(['id'=>Session::get('id')])->first();
        // dd($candidate->id);
        return view('candidate.profile',['candidate'=>$candidate]);
    }

    public function candidatesProfile(Request $request){
        $voteGiven = VoteCollection::find(Session::get('id'));
        $candidates = Candidate::where(['status'=>'valid'])->get();
        $votedDate = date('Y-m-d');
        $voteEvent = VoteEvent::where(['electionDate'=>$votedDate])->first();
        return view('voter.candidatesProfile',['candidates'=>$candidates, 'voter'=>'', 'voteGiven'=>$voteGiven, 'voteEvent'=>$voteEvent]);
    }

    public function voterProfile(Request $request){
        $voterInfo = Voter::where('id',Session::get('id'))->first();
        $voteGiven = VoteCollection::where('voterId',Session::get('id'))->first();
        $votedDate = date('Y-m-d');
        $voteEvent = VoteEvent::where(['electionDate'=>$votedDate])->first();
        return view('voter.candidatesProfile',['voterInfo'=>$voterInfo,'voter'=>'voter', 'voteGiven'=>$voteGiven, 'voteEvent'=>$voteEvent]);
    }

    public function logout(Request $request){
        $type = $request->get('type');
        Session::flush();
        if($type=='voter'){
            return redirect()->route('login',['type'=>'voter']);
        }
        elseif($type=='candidate'){
            return redirect()->route('login',['type'=>'candidate']);
        }
        elseif($type=='admin'){
            return redirect()->route('adminLogin');
        }
    }
    
}
