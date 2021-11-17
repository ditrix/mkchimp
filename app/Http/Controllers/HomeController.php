<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class HomeController extends Controller
{
    public function home(){
        return view('home');    
    }
    public function subscribe(Request $request){

//dd('here1');
//        $api = Newsletter::getApi();
//        dd($api->get('lists'));
//dd('here2');        
//        $batch = $api->new_batch();

// dd($batch);


            Newsletter::subscribe($request->email,['LNAME' => $request->lastname]);
            if(Newsletter::getLastError()) {
                return redirect()->back()->withErrors(['message' => Newsletter::getLastError()]);
            } else {
                return redirect()->back()->with('message','subscribed');
            }





/*

        $res = Newsletter::createCampaign(
    'dmvolosgin@gmail.com',
    'dmvolosgin@gmail.com',
    'my comaight',
    '<html><body><h1>hellow world</h1></body></html>'
    );


            if(Newsletter::getLastError()) {
                return redirect()->back()->withErrors(['message' => Newsletter::getLastError()]);
            }

            return redirect()->back()->with('message','Campaign created');
*/

        if(Newsletter::getLastError() !== false) {
            return redirect()->back()->withErrors(['message' => 'api ok']);            
        } else {
            return redirect()->back()->withErrors(['message' => Newsletter::getLastError()]);            
        }       

        $request->validate([
           'email' => 'required|email',
        ]);


        try {
            if(Newsletter::isSubscribed($request->email)){
  
                return redirect()->back()->with('message','Email '.$request->email.' already subscribed');

            }
            Newsletter::subscribe($request->email,['LNAME' => $request->name]);

            if(Newsletter::getLastError() !== false) {

                return redirect()->back()->withErrors(['message' => Newsletter::getLastError()]);

            }
            return redirect()->back()->with('message','Subscribed');

        } catch(\Exception $e){

            return  redirect()->back()->with('message',$e->getMessage());
        }


    } // subscribe
    


    public function send(){
        Newsletter::addTags(['Custmer'],'ditrix20064@gmail.com.com','subscribers');
        //dd(Newsletter::getTags('dmvoloshin@yahoo.com','subscribers'));
        return redirect()->back()->with('message','tag added');
    }

    public function createCampaign(Request $request){
        $campaign = Newsletter::createCampaign(
            'dmvoloshin@gmail.com',
            'ditrix2006@gmail.com',
            $request->subject,
            '<html><body><p>'.$request->content.'</p></body></html>'
        );  
        if(Newsletter::getLastError())
            return redirect()->back()->withErrors(['message' => Newsletter::getLastError()]);

        return redirect()->back()->with('message','campaign created');

    }

}
