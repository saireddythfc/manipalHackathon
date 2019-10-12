<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Investor;
use App\Idea; 
use App\Investment;
use App\Startup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvestorController extends Controller
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

    public function investAmount($id)
    {
    	return view('investmentForm')->with('idea_id',$id);
    }

    public function startInvestment(Request $data)
    {
    	//retrieve logged in user's id
        $loggedInUser = Auth::user();
        $user_id = $loggedInUser->id;
        //return ($loggedInUser);

        //find investor's id for the logged in user
        $investors = DB::table('investors')->where('user_id',$user_id)->get();
        $flag = 0;
        foreach($investors as $investor)
        {
        	if($investor->user_id==$user_id)
        	{
        		$investor_id = $investor->id;
        		$flag=1;
        		break;		
        	}
        }

        //if user has not been assigned a investor id
        if($flag==0)
        {
        	//add user's id to the investor table
        	$new_investor = new Investor();
        	$new_investor->user_id = $user_id;
        	$new_investor->save();  
        	//return ($new_investor);
        	$investor_id = $new_investor->id;
        }


        //add data from investment form
        $data = $data->all();

        $investment = new Investment();
        $investment->investor_id = $investor_id;
        $investment->idea_id = $data['idea_id'];
        $investment->amount = $data['amount'];
        $investment->status = 'pending conformation';
        $investment->save();

        $investmentAmount = DB::table('investments')->where('idea_id','=',$data['idea_id'])->sum('amount');
        
        $idea = Idea::find($data['idea_id']);
        $ideaAmount = $idea->investment;
        
        if($investmentAmount >= $ideaAmount)
        {
            $idea->status = "Ready for deployment.";
        }
        else
        {
            $idea->status = "Initiated.";
        }
        $idea->save();

        return redirect('/viewIdeas');
    }

    public function showInvestments()
    {
        $loggedInUser = Auth::user();
        $user_id = $loggedInUser->id;

        $investor = User::find($user_id)->investor;
        $investor_id = $investor->id;

        $investments = Investor::find($investor_id)->investments;
        return $investments; 
    }

    public function startupsInvestments($id)
    {
        $idea = Startup::find($id)->idea;
        $idea_id = $idea->id;

        $investments = Idea::find($idea->id)->investments;

        return view('startupsInvestments')->with('investments',$investments);
    }

    /*public function investorDetails($id)
    {
        $investor = Investor::find($id)->user;
        return $investor;
    }*/

    public function myInvestments()
    {
        $loggedInUser = Auth::user();
        $user_id = $loggedInUser->id;

        $investor = User::find($user_id)->investor;
        $investor_id = $investor->id;

        $myInvestments = DB::table('investments')->where('investor_id','=',$investor_id)->get();

        return view('myInvestments')->with('myInvestments',$myInvestments);
    }
}
