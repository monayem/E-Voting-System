<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Voter;
use App\Party;
use Illuminate\Http\Request;
use Session;

class UserRegistrationController extends Controller
{
	public function candidateRegistration(){
		$parties = Party::all();
		return view('UserHome.candidateRegistration',['parties'=>$parties]);
	}

	public function voterRegistration(){
		return view('UserHome.voterRegistration');
	}

	public function storeCandidate(Request $request){
		$validatedData = $request->validate([
			'firstName'=> 'required|min:4|max:100',
			'lastName'=> 'required|min:4|max:100',
			'email'=> 'required|email',
			'nid'=> 'required',
			'gender'=> 'required',
			'dateOfBirth'=> 'required',
			'password'=> 'required',
			'profileImage'=> 'required',
			'partyName'=> 'required',

		]);

		$name = "";
		if ($request->hasFile('profileImage')) {


			$image = $request->file('profileImage');
			$name = time().'_'.$image->getClientOriginalName();
			$destinationPath = public_path('/candidateImages');
			$image->move($destinationPath, $name);

		}

		$candidates = new Candidate;
		$candidates->firstName = $request->firstName;
		$candidates->lastName = $request->lastName;
		$candidates->email = $request->email;
		$candidates->nid = $request->nid;
		$candidates->gender = $request->gender;
		$candidates->dateOfBirth = $request->dateOfBirth;
		$candidates->password = $request->password;
		$candidates->profileImage = $name;
		$candidates->partyName = $request->partyName;
		$candidates->save();

		Session::flash('message', 'Registration Completed Successfully'); 
		Session::flash('alert-class', 'alert-success'); 

		return redirect()->route('candidateRegistration');


	}


	public function storeVoter(Request $request){
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
			$destinationPath = public_path('/voterImages');
			$image->move($destinationPath, $name);

		}

		$voters = new Voter;
		$voters->firstName = $request->firstName;
		$voters->lastName = $request->lastName;
		$voters->email = $request->email;
		$voters->nid = $request->nid;
		$voters->gender = $request->gender;
		$voters->dateOfBirth = $request->dateOfBirth;
		$voters->password = $request->password;
		$voters->profileImage = $name;
		$voters->save();
		Session::flash('message', 'Registration Completed Successfully'); 
		Session::flash('alert-class', 'alert-success'); 

		return view('UserHome.voterRegistration');

	}


}
