<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Person;

class PersonController extends Controller {
    public function getPeople() {
        $people = Person::all();
        return $people->toJson();
        //echo csrf_token();
    }

    public function getPerson($id) {
        $person = Person::find($id);
        return $person->toJson();
    }

    public function createPerson(Request $request) {
        $person = new Person();
        $person->fill([
            'name' => $request->name, 'surname'=> $request->surname,
            'age'=> $request->age, 'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);
        $person->save();
    }

    public function deletePerson($id) {
        $person = Person::find($id);
        $person->delete();
    }

    public function newPerson() {
        return View::make('newPerson');
    }
}
