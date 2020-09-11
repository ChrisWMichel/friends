<?php

namespace App\Models;

use App\Media\MediaType;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //

    public function type(){
        return MediaType::type($this->mime_type);
    }
}
