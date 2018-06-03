<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use App\Transformers\NewsTransformer;
use \Spatie\Fractalistic\ArraySerializer;

class NewsController extends Controller
{
    public function listNews(News $news)
    {
    	$news = $news->latestFirst()->get();
    	
    	return fractal()
    		->collection($news)
    		->transformWith(new NewsTransformer)
    		->includePartner()
            ->serializeWith(new ArraySerializer)
    		->toArray();
    }
}
