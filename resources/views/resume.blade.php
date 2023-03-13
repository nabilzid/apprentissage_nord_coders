Les controllers :
1. Retourner des données 
    a. Passer une variable à la vue soit avec compact ou with
        - return view('articles', compact('title'));
        - return view('articles')->with('title', $title);

    b. Passer 2 variable
        - return view('articles', compact('title', 'title2'));
        - return view('articles', [
             'title' => $title,
             'title2' => $title2
          ]);
2. Les routes :
    a. 
        Route::get('/', function () {
            return view('welcome');
        });
    b.retourne un string sans avoir à créer un blade
        Route::get('/test_route_string', function(){
            return "Salut les amis";
        });
    c. retourne un json
        Route::get('/return_json', function(){
            return Response()->json([
                'title' => 'Mon super titre',
                'description' => 'Ma super description'
            ]);
        });
    d. Retourner la vue depuis le controller
        Route::get('/articles', [PostController::class, 'index']);
    
    NB. Vérifier que l'id est un entier directement depuis le web.php 
        - Route::get('/posts/{id}', [PostController::class, 'show'])->whereNumber('id');
    e. route redirect
        Route::redirect('/test', '/');
    
        f. group et prefix:
            Grouper et prefixer les routes :
                route::prefix('admin')->group(function(){
                    Route::get('/users', function(){
                        return 'Ma user liste';
                    });
                    
                    Route::get('/articles', function(){
                        return 'Ma article liste';
                    });
                    
                    Route::get('/categories', function(){
                        return 'Ma categorie liste';
                    });
                });
3. Les blades :
    a. Ajouter un template globale : 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mon super site</title>
    </head>
    <body>
        @include('partials.navbar')
        @yield('content')
    </body>
    </html>
        NB. Ici le include sera toujours présent sur toute l'application
        - exp d'utilisation du @yield : 
            @extends('leyouts.app')
            @section('content')
                <h1><a href="#">{{ $title }}</a></h1>
            @endsection




4. Le fichier .env : 
    Contient les mdp de nos services ainsi que toutes les données confidentielles de notre application


5. Les models :

    a. protected $fillable : Spécifier les champs qui seront assigné lors de la création d'une données.

    b. Créer un model avec sa migration :
        php artisan make:model Cat -m

    c. 