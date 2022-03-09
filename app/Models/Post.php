<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * @return string[]
     */
    public function rules()
    {
        if ($this->id !== null) {
            return [
                'id' => 'exists:App\Models\Post,id',
                'title' => 'required|unique:posts,title,' . $this->id . ',id|max:255',
                'body' => 'required',
            ];
        }


        return [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ];
    }
}
