<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 04/05/17
 * Time: 23:36
 */

namespace App\Repository;

class NetflixRepository
{

    /**
     * @var \GuzzleHttp\Client
     */
    public $client;
    private
        $apiUrl = 'http://netflixroulette.net/api/api.php',
        $validFilters = ['title', 'actor', 'director', 'year'];

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }


    public function __construct()
    {
        $this->boot();

        return $this->client;
    }

    public function boot()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function get($queryParams = [])
    {

        $endpoint = $this->mountQueryParams($queryParams);
        return $this->client->request('GET',$endpoint)->getBody();
    }

    private function mountQueryParams($queryParams)
    {
        $query = '';
        foreach ($queryParams as $k => $v) {
            // remove empty filters
            if(empty($v) || !in_array($k, $this->validFilters)) continue;

            // check if there's query already to add a new filter concatened
            $amp = $query ? '&' : '';
            $query .= "{$k}={$v}" . $amp;

        }


        return $this->apiUrl . '?' . $query;
    }

}