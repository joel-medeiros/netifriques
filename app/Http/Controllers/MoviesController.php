<?php

namespace App\Http\Controllers;

use App\Repository\NetflixRepository;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class MoviesController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = [];
        if ($request->isMethod('post')) {

            $filters = $request->all();

            $validator = Validator::make($filters, [
                'year' => 'numeric',
                'title' => 'required_with:year'
            ]);

            if ($validator->fails()) {
                return redirect('movies')
                    ->withErrors($validator)
                    ->withInput();
            }

            $data['filters'] = $filters;

            $apiResponse = \GuzzleHttp\json_decode($this->_doFilter($filters), 1);

            if(isset($apiResponse['errorcode'])){
                $data['errors'] =  $apiResponse['message'];
            }else{
                // check if the moviesApi response is a multidimensional array
                $data['movies'] = count(array_filter($apiResponse, 'is_array')) > 0 ? $apiResponse : [$apiResponse];
            }

        }

        return view('movie.index', $data);
    }

    /**
     * @param $filters
     * @return array|mixed|null|\Psr\Http\Message\ResponseInterface
     */
    private function _doFilter($filters)
    {
        unset($filters['_token']);
        $moviesApi = new NetflixRepository();

        try{
            $request = $moviesApi->get($filters);
        }catch (ClientException $e) {
            $request = $e->getResponse()->getBody();
        }

        return $request;
    }
}
