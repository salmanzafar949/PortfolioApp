<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Requests\PortfolioFormsRequest;
use Illuminate\Http\Request;
use App\Portfolio;
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

    public function show()
    {
        $pt = Portfolio::all();
         return view('profiles.show', compact('pt'));
        //return $pt;
    }
}
