<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class Post extends Model
{
    protected $fillable = ['id_user', 'id_author', 'id_content'];

    public function getContent()
    {
        return Content::find($this->id);
    }

    public function getCountLike()
    {
        return Rating::all()
            ->where('id_post', '=', $this->id)
            ->where('status', '=', '1')->count();
    }

    public function getCountDislike()
    {
        return Rating::all()
            ->where('id_post', '=', $this->id)
            ->where('status', '=', '-1')->count();
    }

    public function getUser()
    {
        return User::find($this->id_user);
    }

    public static function best()
    {
        $query = '
                            SELECT `id`,
                            COALESCE((SELECT `name`FROM users WHERE posts.id_user = users.id)) as user_name,
                            COALESCE((SELECT COUNT(ratings.status)
                                    FROM ratings
                                    WHERE ratings.status = \'1\'
                                      AND posts.id = ratings.id_post)) as count_like,
                          COALESCE((SELECT COUNT(ratings.status)
                                    FROM ratings
                                    WHERE ratings.status = \'-1\'
                                      AND posts.id = ratings.id_post)) as count_dislike
                FROM posts
                ORDER by  count_like  DESC  ';
        $result = DB::select($query);
        $posts = new Collection();
        foreach ($result as $res) {
            $posts->add(Post::find($res->id));
        }

        return $posts;
    }

}
