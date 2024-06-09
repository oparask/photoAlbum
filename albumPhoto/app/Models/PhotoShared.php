<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotoShared extends Model
{
    use HasFactory;

    protected $table = 'photo_shared';
    protected $fillable = ['owner_id', 'photo_id', 'shared_user_id'];

    public static function addPhotoShared($owner_id, $photo_id, $shared_user_id)
    {
        return DB::table('photo_shared')->insert([
            'owner_id' => $owner_id,
            'photo_id' => $photo_id,
            'shared_user_id' => $shared_user_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'shared_user_id');
    }
    public function photo()
    {
        return $this->belongsTo(Photo::class, 'photo_id');
    }


}
