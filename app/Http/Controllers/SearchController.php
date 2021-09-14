<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Todo;
use App\Http\Resources\TodoResource;

class SearchController extends Controller
{
    public function __invoke(Request $request){

        $results = [];

        //요청에 query 라는 키가 들어 있다면
        if($query = $request->get('query')){

            // $results = Todo::search($query)->paginate(3);

            $results = Todo::search($query, function($meilisearch, $query, $options) use ($request) {
                $rankingRules = $meilisearch->getRankingRules();

                $updated_desc_ranking = 'desc(updated_at_timestamp)';

                if(!in_array($updated_desc_ranking,$rankingRules)){
                    $meilisearch->updateRankingRules([
                        'desc(updated_at_timestamp)'
                    ]);
                }

                return $meilisearch->search($query, $options);
            })->paginate(5);

            return response()->json([
                'data' => TodoResource::collection($results->items()),
                'meta' => [
                    'current_page' => $results->currentPage(),
                    'last_page' => $results->lastPage(),
                    'path' => $results->path(),
                    'per_page' => $results->perPage(),
                    'hasMorePages' => $results->hasMorePages(),
                    'total' => $results->total()
                ]
            ],Response::HTTP_OK);
        }else{
            $results = Todo::paginate(5);

            return response()->json([
                'data' => TodoResource::collection($results->items()),
                'meta' => [
                    'current_page' => $results->currentPage(),
                    'last_page' => $results->lastPage(),
                    'path' => $results->path(),
                    'per_page' => $results->perPage(),
                    'hasMorePages' => $results->hasMorePages(),
                    'total' => $results->total()
                ]
            ],Response::HTTP_OK);
        }
    }
}
