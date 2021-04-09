<?php 
$class = $thread->isUnread(Auth::id()) ? 'unread' : 'read'; 

$count = $thread->userUnreadMessagesCount(Auth::id());
$cssClass = $count == 0 ? 'hidden' : '';
$txtLabel = $count > 1 ? 'Nuevos mensajes' : 'Nuevo mensaje';
?>



<tr class="{{ $class }}">
    <td class="check-mail">
        <input type="checkbox" class="i-checks">
    </td>
    <td>          
            <a href="{{ route('messages.show', $thread->id) }}"> 
                                <span class="label label-warning {{ $cssClass }}">{{ $thread->userUnreadMessagesCount(Auth::id()) }}</span>
            </a>            
    </td>
    <td class="mail-ontact"><a href="{{ route('messages.show', $thread->id) }}"> 
           
            &nbsp;
        {{ $thread->latestMessage->user->name }}
       
        </a></td>
       
    <td class="mail-subject"><a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a></td>    
    <td class="text-right mail-date">{{ $thread->latestMessage->created_at }}</td>
</tr>