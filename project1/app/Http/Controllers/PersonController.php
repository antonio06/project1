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
        $personData =  $request->input('person');
        $person = new Person();
        $person->fill([
            'name' => $personData['name'],
            'surname'=> $personData['surname'],
            'age' => $personData['age'],
            'email' => $personData['email'],
            'password' => Hash::make($personData['password'])
        ]);
        $person->save();
    }

    public function updatePerson(Request $request, $id) {
        $personData =  $request->input('person');
        $person = Person::find($id);
        $person->name = $personData['name'];
        $person->surname = $personData['surname'];
        $person->age = $personData['age'];
        $person->email = $personData['email'];
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
