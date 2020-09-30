<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use SpotifyWebAPI;
use SpotifyWebAPI\SpotifyWebAPIException;
use Illuminate\Http\Request;

class SpotifyController extends Controller
{
    private $CLIENT_ID = '7d857c333a7644b1871988b1a6d75a81';
    private $CLIENT_SECRET = 'f347df3dd9084b158c5a0b8f0c0021ea';

    public function connect() {
        $session = new SpotifyWebAPI\Session(
            $this->CLIENT_ID, //id
            $this->CLIENT_SECRET //secret
        );
        $session->requestCredentialsToken();
        return $session->getAccessToken();
    }

    public function searchResults($query, $type, $token) {
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($token);
        return $api->search(
            $query,
            $type
        );
    }

    //TODO check params content and return errors accordingly
    public function connectAndSearch($query = 'Sabaton', $type = 'artist') {
        if(isset($_GET['query']) && isset($_GET['type'])) {
            $query = $_GET['query'];
            $type = $_GET['type'];
        }

        $token = $this->connect();
        $results = $this->searchResults($query, $type, $token);
        return Response::json($results);
    }
}
