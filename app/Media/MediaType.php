<?php


namespace App\Media;


class MediaType {

    public static $images = [
        'image/png',
        'image/jpg',
        'image/jpeg'
    ];

    public static $videos = [
        'video/mp4',
        'video/mpg',
        'video/mpeg',
        'video/avi',
    ];

    public static function type($mime)
    {
        if (in_array($mime, self::$images)) {
            return 'image';
        }

        if (in_array($mime, self::$videos)) {
            return 'video';
        }

        return null;
    }

    public static function all()
    {
        return array_merge(self::$images, self::$videos);
    }
}

