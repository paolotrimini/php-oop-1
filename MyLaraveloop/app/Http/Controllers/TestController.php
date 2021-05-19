<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    // Esercizio 1 - definire classe User caratterizzata da nomeUtente, password
    // - definire una funzione all'interno della classe User per ottenere una stringa
    //   che rappresenti l'utente
    // - all'interno del metodo del controller (home) istanziare un paio di oggetti
    //   di tipo User (new User())
    // - definire i relativi dati (username e password)
    // - stampare risultati della getString() attraverso il dd


    // Esercizio 1a - aggiungere il metodo __construct che acquisisca le 2 informazioni username e
    // password in maniera obbligatoria

    // Esercizio 1b - definire il secondo parametro del costruttore (password) come opzionale e
    // nel caso non sia fornito valorizzare l'attributo corrispondente per mezzo
    // della funzione nativa del php uniqid()


    // Esercizio 1c - generare altre due istanze della classe User, e aggiungere poi tutti gli oggetti
    // creati all'interno di un array
    // - ciclando sull'array stampare tutti gli elementi

    class MyClass {
        public $name;
        public $value;
        public function __construct($name, $value) {
            $this -> name = $name;
            $this -> value = $value;
            if ($value === -1) {
                $this -> value = 'ciao';
            }
        }
        public function getString() {
            return "MyClass: " . 'Username: '. $this -> name . " -- " . 'Password: ' . $this -> value;
        }
    }
    class User {
        public $username;
        public $password;
        public function __construct($username, $password = null) {
            $this -> username = $username;
            if ($password == null) {
                $this -> password = uniqid();
            } else {
                $this -> password = $password;
            }
        }
        public function getString() {
            return "User: " . 'Username: ' . $this -> username . " -- " . 'Password: ' . $this -> password;
        }
    }

    class TestController extends Controller
    {
        public function home() {
            $user1 = new User('Paul', 'miaPass');
            // $user1 -> username = 'Paul';
            // $user1 -> password = 'miaPass';
            $user2 = new User('Franco');
            // $user2 -> username = 'Franco';
            // $user2 -> password = 'tuaPass';
            $user3 = new User('Chiara');
            $user4 = new User('Francesco', 'tuaPass');
            $users = [
                $user1,
                $user2,
                $user3,
                $user4
            ];
            $str = '';
            foreach ($users as $user) {
                $str .= $user -> getString() . "\n";
            }
            //dd($str);
            return view("pages.home");
        }
    }
