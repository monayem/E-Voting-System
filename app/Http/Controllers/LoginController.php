<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\CandidateEvent;
use App\Voter;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
	public function home(){
		$events = CandidateEvent::all();
    	return view('home.home',['events'=>$events]);
    }

	public function login(Request $request)
	{
		$type = $request->type;
		return view('login',['type'=>$type]);
	}

	public function loginPost(Request $request)
	{
		// dd('teste');
    	// dd($request->id);
		$type = $request->type;
		$email = $request->get('email');
		$password = $request->get('password');
		if($type == 'candidate'){
			$candidate = Candidate::where(['email'=>$email, 'password'=>$password,'status'=>'valid'])->first();
			if(count($candidate)>0){
				Session::put(['id'=> $candidate->id]);
				Session::put(['role'=> 'Candidate']);
				Session::put(['profileImage'=> $candidate->profileImage]);
				Session::put(['firstName'=>strtoupper( $candidate->firstName), 'lastName'=>strtoupper( $candidate->lastName)]);
				return redirect()->route('dashboard',['type'=>'candidate']);
			}
			else{
				Session::flash('message', 'Invalid email or password given!!!'); 
				Session::flash('alert-class', 'alert-danger'); 
				return redirect()->route('login',['type'=>'candidate']);
			}

		}
		elseif($type=='voter'){
			$voter = Voter::where(['email'=>$email, 'password'=>$password,'status'=>'valid'])->first();
			//dd($voter);
			if(count($voter)>0){
				Session::put(['id'=> $voter->id]);
				Session::put(['role'=> 'Voter']);
				Session::put(['profileImage'=> $voter->profileImage]);
				Session::put(['firstName'=>strtoupper( $voter->firstName), 'lastName'=>strtoupper( $voter->lastName)]);
				return redirect()->route('dashboard',['type'=>'voter']);
			}
			else{
				Session::flash('message', 'Invalid email or password given!!!'); 
				Session::flash('alert-class', 'alert-danger'); 
				return redirect()->route('login',['type'=>'voter']);
			}
		}

		return view('login',['type'=>$type]);
	}
}
