<?php

namespace App\Helpers;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException; // Pusher\Laravel\Facades\Pusher
use Lexx\ChatMessenger\Models\Message;
use Lexx\ChatMessenger\Models\Participant;
use Lexx\ChatMessenger\Models\Thread;
use Pusher;
use App\ModelsView\MessageModelView;
use App\Models\User;

class HMessage
{

    public static function send(MessageModelView $messag, $respuesta = '')
    {
        $thread = Thread::create([
            'subject' => $messag->subject,
        ]);

        // Message
        $message = Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => $messag->body,
        ]);

        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon,
        ]);

        $thread->addParticipant($messag->participants);

        // check if pusher is allowed
        if (config('chatmessenger.use_pusher')) {
            $sender = $message->user;
            $data = [
                'thread_id' => $thread->id,
                'div_id' => 'thread_' . $thread->id,
                'sender_name' => $sender->nameComplete,
                'thread_url' => route('messages.show', ['id' => $thread->id]),
                'thread_subject' => $thread->subject,
                'message' => $message->body,
                'html' => '',
                'text' => str_limit($message->body, 50),
                'type' => 'MS',
            ];

            $recipients = $thread->participantsUserIds();
            if (count($recipients) > 0) {
                foreach ($recipients as $recipient) {
                    if ($recipient == $sender->id) {
                        continue;
                    }

                    //$respuesta = Pusher::trigger(['for_user_' . $recipient], 'new_message', $data);
                    $pusher = new Pusher\Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), array('cluster' => env('PUSHER_APP_CLUSTER')));
                    $respuesta = $pusher->trigger(['for_user_' . $recipient], 'new_message', $data);
                }
            }
        }

        return $respuesta;
    }

    public static function sendM(Message $message, $respuesta = '')
    {
        $thread = $message->thread;
        $sender = $message->user;

        // check if pusher is allowed
        if (config('chatmessenger.use_pusher')) {
            $data = [
                'thread_id' => $thread->id,
                'div_id' => 'thread_' . $thread->id,
                'sender_name' => $sender->nameComplete,
                'thread_url' => route('sicenet.messages.show', ['id' => $thread->id]),
                'thread_subject' => $thread->subject,
                'message' => $message->body,
                'html' => '',
                'text' => str_limit($message->body, 50),
                'type' => 'MS',
            ];

            $recipients = $thread->participantsUserIds();
            if (count($recipients) > 0) {
                foreach ($recipients as $recipient) {
                    if ($recipient == $sender->id) {
                        continue;
                    }

                    $pusher = new Pusher\Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), array('cluster' => env('PUSHER_APP_CLUSTER')));
                    $respuesta = $pusher->trigger(['for_user_' . $recipient], 'new_message', $data);
                }
            }
        }

        return $respuesta;
    }
}
