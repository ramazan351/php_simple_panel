<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag','search']))->get()
        ]);
    }
    public function show(Listing $listing)
    {
       // dd($listing);
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    public function create()
    {
        return view('listings.create');
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'company' => ['required',Rule::unique('listings', 'company')],
            'website' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required'
        ]);

        Listing::create($request->all());
        return redirect('/')->with('message', 'Thanks for your submission');


    }
}
