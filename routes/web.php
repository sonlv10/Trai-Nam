<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('app');
});

Route::get('/products', function () {
    return 'get success';
});
Route::get('/redirect', function (Request $request) {
    $request->session()->put('state', $state = Str::random(40));

    $query = http_build_query([
        'client_id' => 3,
        'redirect_uri' => 'http://laravel-vue.us/callback',
        'response_type' => 'code',
        'scope' => '',
        'state' => $state,
    ]);

    return redirect('http://laravel-vue.us/oauth/authorize?'.$query);
});

Route::get('/callback', function (Request $request) {
    $state = $request->session()->pull('state');

    throw_unless(
        strlen($state) > 0 && $state === $request->state,
        InvalidArgumentException::class
    );

    $http = new GuzzleHttp\Client;

    $response = $http->post('http://laravel-vue.us/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 3,
            'client_secret' => 'HxEB7QqTbOgkpEv2v4ONiZbEyIUf9ZiknBg2e0Lg',
            'redirect_uri' => 'http://laravel-vue.us/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('api/auth/{provider}/url', 'Api\Auth\SocialController@loginUrl');
Route::get('api/auth/{provider}/callback', 'Api\Auth\SocialController@loginCallback');