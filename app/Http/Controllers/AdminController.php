<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Candidate;
use App\Party;
use App\VoteEvent;
use App\Voter;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{

	public function adminDashboard(){
		$candidates = Candidate::where('status', 'invalid')->get();
		return view('admin.dashboard', ['candidates'=>$candidates]);
	}	

	public function createParty(){
		return view('admin.createParty');
	}	

	public function createVoteEvent(){
		return view('admin.createVoteEvent');
	}	

	public function approveCandidate(Request $request){
		$id = $request->get('id');
		$candidate = Candidate::find($id);
		if($candidate){
			$candidate->status = 'valid';
			$candidate->save();
			return $id;
		}
	}

	public function disapproveCandidate(Request $request){
		$id = $request->get('id');
		$candidate = Candidate::find($id);
		if($candidate){
			$candidate->status = 'invalid';
			$candidate->save();
			return $id;
		}
	}

	public function registeredCandidate(){
		$candidates = Candidate::where('status', 'invalid')->get();
		return view('admin.dashboard', ['candidates'=>$candidates]);
	}


	public function filteredCandidate(){
		$candidates = Candidate::where('status', 'valid')->get();
		return view('admin.filteredCandidate', ['candidates'=>$candidates]);
	}

	public function appliedVoter(){
		$voter = Voter::where('status', 'invalid')->get();
		return view('admin.appliedVoter', ['voters'=>$voter]);
	}

	public function verifyVoter(Request $request){
		$id = $request->get('id');
		$voter = Voter::find($id);
		if($voter){
			$voter->status = 'valid';
			$voter->save();
			return $id;
		}
	}

	public function disapproveVoter(){
		$voter = Voter::where('status', 'valid')->get();
		return view('admin.disapproveVoter', ['voters'=>$voter]);
	}

	public function unverifyVoter(Request $request){
		$id = $request->get('id');
		$voter = Voter::find($id);
		if($voter){
			$voter->status = 'invalid';
			$voter->save();
			return $id;
		}
	}

	public function adminRegistration(){
		$adminCount = Admin::count();
		if($adminCount==0){
			return view('admin.adminRegistration');
		}
		else{
			Session::flash('message', 'There can be only one Admin !!!'); 
			Session::flash('alert-class', 'alert-danger'); 
			return redirect()->route('adminLogin');
		}
	}

	public function adminLogin(){
		return view('admin.adminLogin');
	}

	public function adminLoginPost(Request $request){
		$email = $request->get('email');
		$password = $request->get('password');
		$admin = Admin::where( ['email'=>$email, 'password'=>$password ])->get();
		// dd(count($admin));

		if(count($admin)>0){
			Session::put(['id'=> $admin[0]->id]);
			Session::put(['role'=> 'Admin']);
			Session::put(['profileImage'=> $admin[0]->profileImage]);
			Session::put(['firstName'=>strtoupper( $admin[0]->firstName), 'lastName'=>strtoupper( $admin[0]->lastName)]);
		// dd(strtoupper(Session::get('firstName')) );
			return redirect()->route('adminDashboard');
		}
		else{
			Session::flash('message', 'Invalid email or password given!!!'); 
			Session::flash('alert-class', 'alert-danger'); 
			return redirect()->route('adminLogin');
		}
	}

	public function storeAdmin(Request $request){
		$validatedData = $request->validate([
			'firstName'=> 'required|min:4|max:100',
			'lastName'=> 'required|min:4|max:100',
			'email'=> 'required|email',
			'nid'=> 'required',
			'gender'=> 'required',
			'dateOfBirth'=> 'required',
			'password'=> 'required',
			'profileImage'=> 'required',

		]);

		$name = "";
		if ($request->hasFile('profileImage')) {


			$image = $request->file('profileImage');
			$name = time().'_'.$image->getClientOriginalName();
			$destinationPath = public_path('/adminImages');
			$image->move($destinationPath, $name);

		}

		$admin = new Admin;
		$admin->firstName = $request->firstName;
		$admin->lastName = $request->lastName;
		$admin->email = $request->email;
		$admin->nid = $request->nid;
		$admin->gender = $request->gender;
		$admin->dateOfBirth = $request->dateOfBirth;
		$admin->password = $request->password;
		$admin->profileImage = $name;
		$admin->save();
		Session::flash('message', 'Registration Completed Successfully'); 
		Session::flash('alert-class', 'alert-success'); 

		return redirect()->route('adminLogin');

	}

	public function storeParty(Request $request){
		$validatedData = $request->validate([
			'partyName'=> 'required',
			'email'=> 'required|unique:parties',
			'partyLogo'=> 'required',

		]);

		$name = "";
		if ($request->hasFile('partyLogo')) {


			$image = $request->file('partyLogo');
			$name = time().'_'.$image->getClientOriginalName();
			$destinationPath = public_path('/partyImages');
			$image->move($destinationPath, $name);

		}

		$parties = new Party;
		$parties->partyName = $request->partyName;
		$parties->email = $request->email;
		$parties->partyLogo = $name;
		$parties->save();
		Session::flash('message', 'Party Created Successfully'); 
		Session::flash('alert-class', 'alert-success'); 

		return redirect()->route('createParty');

	}

	public function storeVoteEvent(Request $request){
		$validatedData = $request->validate([
			'electionName'=> 'required',
			'electionDate'=> 'required',
			'eventBanner'=> 'required',

		]);

		$name = "";
		if ($request->hasFile('eventBanner')) {


			$image = $request->file('eventBanner');
			$name = time().'_'.$image->getClientOriginalName();
			$destinationPath = public_path('/voteEventImages');
			$image->move($destinationPath, $name);

		}

		$voteEvent = new VoteEvent;
		$voteEvent->electionName = $request->electionName;
		$voteEvent->electionDate = $request->electionDate;
		$voteEvent->eventBanner = $name;
		$voteEvent->save();
		Session::flash('message', 'Vote Event Created Successfully'); 
		Session::flash('alert-class', 'alert-success'); 

		return redirect()->route('createVoteEvent');

	}

}
