<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'category_id', 'reply_count', 'view_count', 'last_reply_user_id', 'order', 'excerpt', 'slug'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // laravel的本地作用域
    public function scopeWithOrder($query, $order){
        switch($order){
            case 'recent':
                $query->recent();
                break;
            default:
                $query->recentReplied();
                break;
        }
        return $query->with('user', 'category');
    }
    // 预加载 防止 N+1 问题

    public function scopeRecentReplied($query){
        // for new ply, we will write logic, 更新话题 reply_count
        // trigger tthe data_model, updated_at timestamp
        return $query->orderBy('updated_at', 'desc');
}

    public function scopeRecent($query){
        // orderBy
        return $query->orderBy('created_at', 'desc');
    }

    public function link($params = []){
      return route('topics.show', array_merge([$this->id, $this->slug], $params));
      // return redirect()->to($topic->link())->with('success', '成功创建话题！');
    }
}
