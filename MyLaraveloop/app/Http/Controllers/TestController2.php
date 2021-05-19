<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    // generare nuovo controller con rotta associata; definire poi classe Movie
    // con titolo e descrizione; definire costruttore con titolo necessario e descrizione opzionale;
    // e metodo getString() che restituisca una stringa riportante tutte le variabili;
    // generare poi un paio di istanze e stamparle per mezzo del dd() come visto in classe

    class Movie {
        public $title;
        public $description;

        public function __construct($title, $description = null) {  // descrizione opzionale
            $this -> title = $title;

            if($description == null){
                $this -> description = 'descrizione assente';
            } else {
                $this -> description = $description;
            }
        }
        public function getString() {
            return "MyClass: " . 'Title: '. $this -> title . " -- " . 'Description: ' . $this -> description;
        }

    }

    class TestController2 extends Controller
    {
        public function home() {
            $movie1 = new Movie('Matrix', 'fantascienza, azione');
            $movie2 = new Movie('La teoria del tutto', 'biografico, drammatico');
            $movie3 = new Movie('Soul', '');

            dd($movie1, $movie2, $movie3);

            return view("pages.home");
        }
    }
