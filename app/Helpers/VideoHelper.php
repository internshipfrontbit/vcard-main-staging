<?php

// namespace App\Helpers;

// class VideoHelper
// {
//     public static function getVideoLinks()
//     {
//         return [
//                 "https://www.youtube.com/embed/4N3yfYMKlY4",
//                 "https://www.youtube.com/embed/kVBG8GZ60Vo",
//                 "https://www.youtube.com/embed/il5Eg2l5vFs",
//                 "https://www.youtube.com/embed/u5GNOeU3-Qw",
//                 "https://www.youtube.com/embed/vHS8HrHHb7M",
//                 "https://www.youtube.com/embed/l20YtiDuPiM",
//                 "https://www.youtube.com/embed/J5hhVPwagCg",
//                 "https://www.youtube.com/embed/V5XDM5BqMRE",
//                 "https://www.youtube.com/embed/k2QHrLdROsg",
//                 "https://www.youtube.com/embed/7WMybR1Up9s"
           
//         ];
//     }
// }


namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class VideoHelper
{
    public static function getVideoLinks($storeId = null)
    {
        // If you pass storeId, fetch links for that specific store
        // Adjust this logic if you always have storeId in session or auth
        if(!$storeId){
            // Example default storeId
            $storeId = 1;
        }

        $record = DB::table('wp_youtube_embeded')
                    ->where('wp_store_id', $storeId)
                    ->first();

        $youtube_links = [];

        if ($record && $record->youtube_links) {
            $youtube_links = json_decode($record->youtube_links, true);
        }

        // Return array of YouTube embed URLs
        // Optionally convert to embed links here if you stored normal URLs

        $embedLinks = [];
        foreach($youtube_links as $link){
            $embedLinks[] = self::convertToEmbedUrl($link);
        }

        return $embedLinks;
    }

public static function convertToEmbedUrl($url)
{
    $videoId = null;

    // Match various YouTube URL formats
    if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
        $videoId = $matches[1];
    }

    if ($videoId) {
        return "https://www.youtube.com/embed/" . $videoId;
    }

    return $url; // fallback if parsing fails
}
}

