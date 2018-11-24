<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Subscriber
 * @package App
 * 
 * @property int id
 * @property int user_id The id of the user managing this subscriber
 * @property string email
 * @property string address
 * @property string name
 * @property string state
 * @property bool active
 * @property bool unsubscribed
 * @property bool junk
 * @property bool bounced
 * @property bool unconfirmed
 * @property Carbon created_at
 * @property Carbon updated_at
 * 
 * 
 */
class Subscriber extends Model
{
    protected $table = 'subscribers';
    //
}
