<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Location
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Camera[] $cameras
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location query()
 */
	class Location extends \Eloquent {}
}

namespace App{
/**
 * App\ClientCamera
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientCamera newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientCamera newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientCamera query()
 */
	class ClientCamera extends \Eloquent {}
}

namespace App{
/**
 * App\Client
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client query()
 */
	class Client extends \Eloquent {}
}

namespace App{
/**
 * App\Camera
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Camera newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Camera newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Camera query()
 */
	class Camera extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\ClientUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientUser query()
 */
	class ClientUser extends \Eloquent {}
}

