<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Requests\PortfolioFormsRequest;
use Illuminate\Http\Request;
use App\Portfolio;
use App\User;
class PortfoliosController extends Controller
{
    //

    public function index()
    {
        return view('profiles.portfolio');
    }

    public function store(PortfolioFormsRequest $r)
    {
         if($r->hasFile('P_image'))
           {
            
            $P_image = $r->P_image->store('public/Portfolio_pics');
               
           }
           else{
                  $P_image = 'public/Portfolio_pics/P_image.jpg';
           }

            Portfolio::create([
                'user_id' => Auth::user()->id,
                'p_name' => $r->p_name,
                'p_url'  => $r->p_url,
                'p_desc' => $r->p_desc,
                'P_organization' => $r->P_organization,
                'P_image'  => $P_image,
                 
            ]);

            return redirect()->route('home');
    }

    public function show($slug)
    { 
        $user = User::where('slug',$slug)->get();
        //$u_id = $user->id;
        $u_id = '';
        foreach($user as $use)
        {
            $u_id = $use->id;
        }    
          
         $pt = Portfolio::where('user_id',$u_id)->get();
         return view('profiles.show', compact('pt'));
         // return $pt;
        //dd($pt);
    }

    public function edit($id)
    {
        $project = Portfolio::findOrFail($id);
        return view('profiles.edit-portfolio', compact('project'));
    }

    public function update(Request $r, $id)
    {
        $project = Portfolio::findOrFail($id);
        if ($r->hasFile('P_image'))
        {
        $project->update($r->all());
        }
        else
        {
            $project->update([
                  'p_name' => $r->p_name,
                  'p_desc' => $r->p_desc,
                  'p_url'  => $r->p_url,
                  'P_organization' => $r->P_organization,
                  'user_id' => Auth::user()->id,
            ]);
        }
        //return $project;
        //return $r->all();
        return redirect()->route('home');
    }

    public function delete($id)
    {
            $project = Portfolio::findOrFail($id);
            $project -> delete();
            return redirect()->route('home');
    }
}
