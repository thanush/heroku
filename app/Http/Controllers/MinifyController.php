<?php

namespace App\Http\Controllers;
use URL;
use Illuminate\Http\Request;

class MinifyController extends Controller
{
    public function index()
    {
        // setup the URL, the CSS and the form data
    $url = 'https://cssminifier.com/raw';
    $css = file_get_contents(URL::asset('css/app.css'));

    $data = array(
        'input' => $css,
    );
    // var_dump();
    // dd($data);
    // init the request, set some info, send it and finally close it
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $minified = curl_exec($ch);

    curl_close($ch);

    // output the $minified
    echo $minified;
    }
}
