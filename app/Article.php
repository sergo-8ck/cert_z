<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class Article extends Model
{
    //Mass assigned
    protected $fillable = ['title', 'slug', 'date', 'document', 'datedoc', 'description', 'published', 'created_by', 'modified_by'];

    //Mutators
    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    //Polymorphic relation with categories
    public function categories()
    {
        return $this->morphToMany('App\Category', 'categoryable');
    }

    public function scopeLastArticles($query, $count)
    {
        return $query->orderBy('articles.created_at', 'desc')->take($count)->get();
    }
    public function scopeSearch($query, $s) {
        return $query->where('articles.title', 'like', '%' .$s. '%')
            ->orWhere('articles.slug', 'like', '%' .$s. '%');
    }

    public function scopeSearchforcat($query, $q) {
        return $query->select(DB::raw('articles.*, categories.title as cat_title, categories.id as cat_id'))
            ->join('categoryables', 'articles.id', '=', 'categoryables.categoryable_id')
            ->join('categories', 'categoryables.category_id', '=', 'categories.id')
            ->where('categories.id', $q);
    }

    public function scopeSearchblog($query, $s, $d) {
        return $query->where('document', 'like', '%' .$s. '%')
            ->where('date', 'like', '%' .$d. '%');
    }
}
