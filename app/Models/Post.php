<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Post
 * @property int $id
 * @property int $user_id
 * @property int $user_name
 * @property string $text
 * @property boolean $is_public
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 * @method static Builder|Post whereId()
 * @method static Builder|Post whereUserId()
 * @method static Builder|Post whereUserName()
 * @method static Builder|Post whereText()
 * @method static Builder|Post whereIsPublic()
 * @method static Builder|Post whereCreatedAt()
 * @method static Builder|Post whereUpdatedAt()
 * @mixin Eloquent
 */
class Post extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}
