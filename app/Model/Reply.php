<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';
    protected $fillable = [
        'body'
    ];

    public function user()
    {
        /**
         * User::class related 关联模型
         * user_id ownerKey 当前表关联字段
         * id relation 关联表字段，这里指 user 表
         */
        return $this->belongsTo('App\Model\User', 'user_id', 'id');
    }
    
    public function message()
    {
        /**
         * @param  string $related    关联关系
         * @param  string $table      关联中间表 不填默认为 role_user 规则为：Str::snake(class_basename($related)). '_' . Str::snake(class_basename($this)) 并在数据拼接前使用 sort() 排序；
         * @param  string $foreignKey 当前模型的外键id,不填默认为 role_id 规则为：Str::snake(class_basename($this)).'_'.$this->primaryKey;
         * @param  string $relatedKey 关联模型的外键id，不填默认为 user_id 规则为：Str::snake(class_basename($related)).'_'.$related->primaryKey
         */
        return $this->belongsToMany('App\Model\Message', 'message_reply', 'message_id', 'reply_id')
            ->withPivot(['created_at', 'updated_at']) // 中间表的字段，这里的中间表是 role_user
            ->withTimestamps();
    }
}
