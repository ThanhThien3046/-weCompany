<?php
namespace App\Repositories\DB;

use App\Helpers\SupportString;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class DBEloquentRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return DB::class;
    }
    
    public function searchPost( $query ){
        // $query = SupportString::convertLang($query);
        $words = preg_replace('/\s+/', ' ', $query);
        $words = preg_replace('/\s+/', '|', $words);


        return $this->_model::table('posts')
        ->whereRaw("search_tsv @@ plainto_tsquery(vn_unaccent('$query'))")
        ->select('*')
        ->where("posts.public", 1)
        ->addSelect(DB::raw("ts_headline(title, to_tsquery('$words')) as title"))
        ->addSelect(DB::raw("ts_headline('simple', search_doc, to_tsquery('simple', '$words')) as search_document"))
        ->orderByRaw("ts_rank(search_tsv, plainto_tsquery(vn_unaccent('$query'))) DESC");
    }

    
}