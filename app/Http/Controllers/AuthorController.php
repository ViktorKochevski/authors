<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::all();

        return view('authors.index', compact('authors'));
    }

    public function saveCsv(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|extensions:csv'
        ]);

        if ($validator->fails()) {
            return redirect()->route('index')
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file;

        $authors = [];

        if (($open = fopen($file, "r")) !== FALSE) {

            $header = fgetcsv($open, 1000, ",");

            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {

                $row = array_combine($header, $data);
                $authors[] = $row;
            }

            fclose($open);
        }


        foreach ($authors as $author) {

            Author::create([
                'first_name'        => $author['First Name'],
                'last_name'         => $author['Last Name'],
                'date_of_birth'     => $author['Date of Birth'],
                'date_of_death'     => $author['Date of Death'],
                'book'              => $author['Books'],
                'nobel_prize'       => $author['Nobel Prize Winner']
            ]);
        }

        Session::flash('flash_message', 'CSV successfully uploaded!');

        return redirect()->route('index');
    }

}
