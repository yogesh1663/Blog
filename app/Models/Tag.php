<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id', 'name'
    ];

    public static function insertDeleteTag($id, $tags)
    {
        // dd($tags);
        Tag::where('post_id', $id)->delete();
        if (!empty($tags)) {
            $tagsArray = explode(',', $tags);
            foreach ($tagsArray as $tag) {
                $saveTag = new Tag;
                $saveTag->post_id = $id;
                $saveTag->name = $tag;
                $saveTag->save();
            }
        }
    }

    // public function posts():HasMany
    // {
    //     return
    // }
}
