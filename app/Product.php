<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recomended'
    ];

    public function images(){
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function category(){
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function tags(){
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    /*
    public function getNameDescriptionAttribute(){
        return $this->name.' - '.$this->description;
    }
    */

    public function getTagListAttribute(){
        //$tags = $this->tags->lists('name');
        //return implode(",", $tags);

        return $this->tags->lists('name');
    }

    public function scopeFeatured($query){
        return $query->where('featured','=','1');
    }

    public function scopeRecomended($query){
        return $query->where('recomended','=','1');
    }

}
