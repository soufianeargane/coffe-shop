<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class MealsController extends Controller
{
    //
    public function messi()
    {
        $meals = Meal::all();
        return view('dashbord', ['meals' => $meals]);
    }
    public function home()
    {
        $meals = Meal::all();
        return view('welcome', ['meals' => $meals]);
    }
    public function insert(Request $request)
    {
        $meal = new Meal();
        // validate the title and description and the image
        $validation = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        // $path = $request->file('file')->storeAs('myImages', 'messi.png');
        $meal->title = $request->title;
        $meal->description = $request->description;
        // upload the image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $meal->image = $imageName;

        $meal->save();

        // show message of success
        session()->flash('success', 'Meal added successfully');


        return redirect('/dashbord');
    }

    public function getSingledata($id)
    {
        $data = Meal::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $meal = Meal::find($request->id);
        // validate the title and description
        $validation = $request->validate([
            'title_update' => 'required',
            'description_update' => 'required',
        ]);

        $meal->title = $request->input('title_update');
        $meal->description = $request->input('description_update');
        $image = $request->file('image_update');
        if ($image) {
            // valid image
            $validation = $request->validate([
                'image_update' => 'required|mimes:jpg,jpeg,png|max:2048'
            ]);
            $imageName = time() . '.' . $request->image_update->extension();
            $request->image_update->move(public_path('images'), $imageName);
            $meal->image = $imageName;
        }
        $meal->save();
        // show message of success
        session()->flash('success', 'Meal updated successfully');
        return redirect('/dashbord');
    }

    public function delete($id)
    {
        $meal = Meal::find($id);
        $meal->delete();
        // show message of success
        session()->flash('success', 'Meal deleted successfully');
        return redirect('/dashbord');
    }
}
