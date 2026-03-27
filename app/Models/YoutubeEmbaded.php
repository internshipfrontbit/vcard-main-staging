namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YoutubeEmbaded extends Model
{
    protected $table = 'wp_youtube_embeded';

    protected $fillable = ['wp_store_id', 'youtube_link'];
}
