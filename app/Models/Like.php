<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Like
 *
 * @property int $id
 * @property int $post_id
 * @property int $liker_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static Builder|Like newModelQuery()
 * @method static Builder|Like newQuery()
 * @method static Builder|Like query()
 * @method static Builder|Like whereId()
 * @method static Builder|Like wherePostId()
 * @method static Builder|Like whereLikerId()
 * @method static Builder|Like whereCreatedAt()
 * @method static Builder|Like whereUpdatedAt()
 * @mixin Eloquent
 */
class Like extends Model
{
    use HasFactory;
}
