<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Message
 *
 * @property int $id
 * @property int $user_id
 * @property int $sender_id
 * @property string $text
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static Builder|Message newModelQuery()
 * @method static Builder|Message newQuery()
 * @method static Builder|Message query()
 * @method static Builder|Message whereId()
 * @method static Builder|Message whereSenderId()
 * @method static Builder|Message whereUserId()
 * @method static Builder|Message whereText()
 * @method static Builder|Message whereCreatedAt()
 * @method static Builder|Message whereUpdatedAt()
 * @mixin Eloquent
 */
class Message extends Model
{
    use HasFactory;
}
