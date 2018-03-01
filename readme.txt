Install Laravel 5.5 

composer create-project laravel/laravel blog  "5.5.*" --prefer-dist

 Install Laravel Collective

 cd blog

 composer require laravelcollective/html

 config/app.php -- módosítom -- 

 'providers' => [

	....

	Collective\Html\HtmlServiceProvider::class,

],

'aliases' [

	....

	'Form' => Collective\Html\FormFacade::class,

    'Html' => Collective\Html\HtmlFacade::class,

],

env.example -- editálom -- adatbázis kapcsolat, és mentem .env néven. 
Létrahozom mondjuk phpmyadmin al a blog adatbázist


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=bcsato56

Írási jogot beállítok a .env filere, a bootstrap/cache 
alkönyvtárra, a storage alkönyvtárra

php artisan key:generate   --- APP_KEY- generálása

php artisan serve -- megnézem, hogy jól telepítettem e a Laravelt.

OK

Create articles Table and Model

database/migrations -- az up függvényt kicserélem erre.

public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
    }

app/Article.php

<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body'
    ];
}

routes/web.php

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('articles','ArticleController');



php artisan make:controller ArticleController -resource

app/Http/Controllers/ArticleController.php

resources/views/layout.blade.php

resources/views/articles/index.blade.php

resources/views/articles/show.blade.php

resources/views/articles/form.blade.php

resources/views/articles/create.blade.php

resources/views/articles/edit.blade.php
