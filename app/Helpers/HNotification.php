<?php

namespace App\Helpers;

use App\Models\UserDis;
use App\Models\User;
use Pusher;
use App\Notifications\NPusher;
use App\ModelsView\NotificacionModelView;
use DB;

class HNotification
{

	public static function send(NotificacionModelView $notif, $respuesta = '')
	{
		if ($notif->type == 'sicenet') {
			$user = User::find($notif->notifiable_id);
		} else {
			$user = UserDis::find($notif->notifiable_id);
		}
		$user->notify(new NPusher($notif->data));
		$pusher = new Pusher\Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), array('cluster' => env('PUSHER_APP_CLUSTER')));
		$respuesta = $pusher->trigger(['for_user_' . $notif->notifiable_id], 'new-notification', $notif->data);
		return $respuesta;
	}
}
