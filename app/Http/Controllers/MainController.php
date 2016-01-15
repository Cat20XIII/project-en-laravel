<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MainController extends Controller
{
    public function essai()
    {
        $produits = [
            [
                "id" => 1,
                "titre" => "Un premier produit",
                "description" => "ipsum",
                "prix" => 25
            ],
            [
                "id" => 2,
                "titre" => "Un second produit",
                "description" => "lorem",
                "prix" => 250
            ],
            [
                "id" => 3,
                "titre" => "Un troisième produit",
                "description" => "lorem ipsum",
                "prix" => 2
            ]
        ];

        $firstname = "3wa";

        return view('test-tableau-fichier', [
            'prenom' => $firstname,
            'produits' => $produits
        ]);
    }

    public function team()
    {
        $equipes = [
            [
                "id" => 1,
                "firstname" => "Marc",
                "lastname" => "Toto",
                "chef" => true,
                "description" => "Lorem ipsum",
                "statut" => "chef",
                "image" => "chef.jpg"
            ],
            [
                "id" => 2,
                "firstname" => "Jean",
                "lastname" => "Michel",
                "chef" => false,
                "description" => "Lorem ipsum",
                "statut" => "graphiste",
                "image" => "graphiste.jpg"
            ],
            [
                "id" => 3,
                "firstname" => "Martine",
                "lastname" => "a la plage",
                "chef" => false,
                "description" => "Lorem ipsum",
                "statut" => "developeur",
                "image" => "developpeur.jpg"
            ],
        ];

        return view('equipe-file', ['superTeam' => $equipes]);
    }

    public function home()
    {
        return view('accueil');
    }

    public function contact(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $validator = Validator::make($request->all(),
            [
                'userName'  => 'required|min:2|max:250',
                'userEmail' => 'required|email',
                'userPhone' => 'required|numeric',
                'userMsg'   => 'required|max:1000',
            ],
            [
                'userName.required' => 'Attention le champ nom est vide',
                'required' => 'Attention le champ est vide',
            ]
            );
            if($validator->fails())
            {
                return redirect()->route('contact_route')
                            ->withInput()
                            ->withErrors($validator);
            }

            Mail::send(['emails.contact-email','emails.contact-email-text'], ["data" => $request->all()], function ($message)
            {
                $message->from('monadressemail@gmail.com');
                $message->to('monadressemail@gmail.com');
            });

            return redirect()->route('contact_route')->with('successContact', 'Votre email a bien été envoyé');

        }
        return view('contact'); // resources/views => contact.blade.php
    }
}
