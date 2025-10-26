<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(){
        $names = Name::orderBy("id", "desc")->paginate(7);
        return Inertia::render('Home', ['names' => $names]);
    }

    public function create(){
        return Inertia::render('create/NewName');
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'fullname' => 'required|string|max:20|min:5'
        ]);
        Name::create($attributes);
        return redirect('/')->with('success', 'Name successfully created!');
    }

    public function show(Name $name){
        return Inertia::render('show/ShowName', ['name'=> $name]);
    }

    public function edit(Name $name){
        return Inertia::render('edit/EditName', ['name'=> $name]);
    }

    public function update(Request $request, Name $name){
        $attributes = $request->validate([
            'fullname' => 'required|string|max:20|min:5',
        ]);

        $name->update($attributes);
        return redirect('/')->with('success', 'Name updated successfully!');
    }

    public function destroy(Name $name){
        $name->delete();

        return redirect('/')->with('success', 'Name deleted successfully!');
    }
}


