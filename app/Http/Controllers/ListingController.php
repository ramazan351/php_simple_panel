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
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(4)->withQueryString()
        ]);
    }
    public function show(Listing $listing)
    {
        // dd($listing->logo);
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

        $formFields=  $request->validate([
            'title' => 'required',
            'company' => ['required',Rule::unique('listings', 'company')],
            'website' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('logo')) {
          $formFields['logo']=  $request->file('logo')->store('logos', 'public');
        }
        // dd($formFields);
        Listing::create($formFields);

        return redirect('/')->with('message', 'Thanks for your submission');


    }
    public function update(Request $request, Listing $listing)
    {

        $formFields=  $request->validate([
            'title' => 'required',
            'company' => 'required',
            'website' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('logo')) {
          $formFields['logo']=  $request->file('logo')->store('logos', 'public');
        }
        // dd($formFields);
        Listing::create($formFields);

        return back()->with('message', 'Thanks for your editing');


    }
    public function edit(Listing $listing)
    {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }
}
