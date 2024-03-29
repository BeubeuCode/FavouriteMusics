<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use SpotifyWebAPI;
use Exception;

/**
 * Class SpotifyController
 * @package App\Http\Controllers
 * @description Classe pour les différentes méthodes liées à Spotify. Les méthodes publique renvoient un JSON.
 * Elle sont traitées par le middleware API, les séparant clairement des méthodes liées au front end.
 */
class SpotifyController extends Controller
{

    private $VALID_QUERY_TYPES = ['artist', 'track', 'album'];

    /**
     * @return string
     */
    public function connect() {
        $session = new SpotifyWebAPI\Session(
            getenv('SPOTIFY_CLIENT_ID'),
            getenv('SPOTIFY_CLIENT_SECRET')
        );
        $session->requestCredentialsToken();
        return $session->getAccessToken();
    }

    /**
     * @param $token
     * @return SpotifyWebAPI\SpotifyWebAPI
     */
    private function createApiSession($token) {
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($token);
        return $api;
    }

    public function searchResults($query, $type, $token) {
        $api = $this->createApiSession($token);
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

    /**
     * @param string $trackID
     * @return JsonResponse
     */
    public function getTrack(string $trackID){
        $token = $this->connect();
        $api = $this->createApiSession($token);
        $api->getTrack($trackID);
        return Response::json($api->getTrack($trackID));
    }

    /**
     * @param string $artistID
     * @return JsonResponse
     */
    public function getArtist(string $artistID) {
        $api = $this->createApiSession($this->connect());
        return Response::json($api->getArtist($artistID));
    }

    /**
     * @param string $albumID
     * @return JsonResponse
     */
    public function getAlbum(string $albumID) {
        $api = $this->createApiSession($this->connect());
        return Response::json($api->getAlbum($albumID));
    }

    public function searchAndAddTrackToAccount($query) {
        $searchResults = $this->searchResults($query, 'track', $this->connect());
        $result = null;
        try {
            $result = $searchResults->tracks->items[0];
        } catch (Exception $e) {
            $musicNotFound = true;
            return Response::redirectTo('/account')->with('musicNotFound');
        }
        return Response::redirectTo('/addmusic/'.$result->id.'/'.$result->name.'/'.$result->artists[0]->name);
    }

    public static function getTrackArt(string $trackId) {
        $spotifyController = new SpotifyController();
        $spotifyController->createApiSession($spotifyController->connect());
        echo 'connected';
        $trackInfo = $spotifyController->getTrack($trackId);
        return $trackInfo->images[0]->url;

    }

}
