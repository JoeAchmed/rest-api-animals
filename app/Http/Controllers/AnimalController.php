<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    private $animals;
    public function __construct() {
        $this->animals = ['kucing', 'ayam', 'ikan'];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all animals
        echo "Menampilkan data animals: <br>";

        foreach ($this->animals as $animal) {
            echo "- " . $animal . "<br>";
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // create new animal's data using input value animal
        array_push($this->animals, $request->animal);

        echo "Menambahkan hewan baru <br>";
        echo "Menampilkan data animals: <br>";

        foreach ($this->animals as $animal) {
            echo "- " . $animal . "<br>";
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update animal's data by id(index) and using input value animal
        if (isset($this->animals[$id])) {
            $this->animals[$id] = $request->animal;
        }

        echo "Mengupdate data hewan id {$id} <br>";
        echo "Menampilkan data animals: <br>";

        foreach ($this->animals as $animal) {
            echo "- " . $animal . "<br>";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete animal's data by id(index)
        if (isset($this->animals[$id])) {
            unset($this->animals[$id]);
            $this->animals = array_values($this->animals); // Reindex the array
        }

        echo "Menghapus data hewan id {$id} <br>";
        echo "Menampilkan data animals: <br>";
        
        foreach ($this->animals as $animal) {
            echo "- " . $animal . "<br>";
        }
    }
}
