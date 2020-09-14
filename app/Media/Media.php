<?php


namespace App\Media;

use Spatie\MediaLibrary\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    public function type(){
        return MediaType::type($this->mime_type);
    }
}
