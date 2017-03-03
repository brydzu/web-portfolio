<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
          use Sluggable;

          /**
           * Return the sluggable configuration array for this model.
           *
           * @return array
           */
          public function sluggable()
          {
              return [
                  'slug' => [
                      'source' => 'title'
                  ]
              ];
          }

         protected $fillable = [
          'category_id',
          'photo_id',
          'title',
          'excerpt',
          'body'
      ];

      // public function scopeLocatedAt($query, $title){
      //
      //     $title = str_replace('-', ' ', $title);
      //
      //     return $query->where(compact('title'));
      //
      // }

      public function user() {

          return $this->belongsTo('App\User');

      }

      public function photo(){

          return $this->belongsTo('App\Photo');

      }

      public function category(){

          return $this->belongsTo('App\Category');

      }

      public function tags(){

          return $this->belongsToMany('App\Tag'); 

      }

      public function comments() {

          return $this->hasMany('App\Comment'); 
      }
}
