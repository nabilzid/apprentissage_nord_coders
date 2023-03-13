<?php

//Définir toujours le namespace
namespace App\Http\Controllers;

class PostController extends Controller
{
    public function index(){
        $title = 'mon super titre';
        // Passer une variable à la vue soit avec compact ou with
        // return view('articles', compact('title'));
        return view('articles')->with('title', $title);

        // Passer 2 variable

        // return view('articles', compact('title', 'title2'));

        // return view('articles', [
        //     'title' => $title,
        //     'title2' => $title2
        // ]);

    }

    public function show($id)
    {
        $posts = [
            1 => 'Mon titre n°1',
            2 => 'Mon titre n°2'
        ];
        $post = $posts[$id] ?? 'Pas de titre';
        return view('article', [
            'post' => $post
        ]);
    }

    public function contact()
    {
        return view('contact');
    }
}