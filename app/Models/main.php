<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class main extends Model
{

    use HasFactory, Sluggable;

    // menggunakan fillable agar bisa mengisi
    // protected $fillable = ['tittle','excerpt','body'];

    // menggunakan guarded agar bisa semuanya mengisi kecuali yang di dalam array
    protected $guarded = ['id'];
    protected $with = ['category','author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters["search"] ?? false, function ($query,$search) {
            return $query->where('tittle','like','%' .  $search . '%')
                         ->orWhere('body','like', '%' . $search . '%');
        });

        $query->when($filters["category"] ?? false, function ($query,$category) {
            $query->whereHas('category', function ($query) use ($category) {
                return $query->where("slug", $category);
            });
        });

        // authors
        $query->when($filters["author"] ?? false, function ($query,$author) {
            // cek relasi antar tabel 
            $query->whereHas('author', function ($query) use ($author){
                return $query->where('username', $author);
            });
        });
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'tittle'
            ]
        ];
    }
}
