<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use SpotifyWebAPI;
use Exception;
use Throwable;

class SpotifyController extends Controller
{

    private $VALID_QUERY_TYPES = ['artist', 'track', 'album'];
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

    /**
     * @param string $query from $_GET
     * @param string $type from $_GET
     * @return JsonResponse|object
     */
    public function connectAndSearch($query = 'Sabaton', $type = 'artist') {
        if(isset($_GET['query']) && isset($_GET['type'])) {
            $query = $_GET['query'];
            $type = $_GET['type'];
        }
        $type = strtolower($type);

        try {
            throw_if(!in_array($type, $this->VALID_QUERY_TYPES), new Exception('Invalid Query Type'));
        } catch (Throwable $e) {
            return Response::json(array(
                'message' => 'incorrect query type',
                'code' => 422
            ))->setStatusCode(422); //unprocessable entity
        }
        $token = $this->connect();
        $results = $this->searchResults($query, $type, $token);
        return Response::json($results);
    }

    public function getTrack(string $trackID){
        $token = $this->connect();
        $api = new SpotifyWebApi\SpotifyWebAPI();
        $api->setAccessToken($token);
        $api->getTrack($trackID);
        return Response::json($api->getTrack($trackID));
    }
}
