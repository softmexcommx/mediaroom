$(function() {


    var pusher = new Pusher('{{ config('pusher.connections.main.auth_key') }}', {
        cluster: '{{ config('pusher.connections.main.options.cluster') }}',
        encrypted: true
    });

    var channel = pusher.subscribe('for_user_{{ Auth::id() }}');

    channel.bind('new_message', function(data) {     
        var thread = $('#' + data.div_id);
        var thread_id = data.thread_id;
        var thread_plain_text = data.text;
        var thread_subject = data.thread_subject;


        if (thread.length) {
            // thread opened

            // append message to thread
            thread.append(data.html);

            // make sure the thread is set to read
            $.ajax({
                url: "/messages/" + thread_id + "/read"
            });
        } else {
            // thread not currently opened

            // create message
            var message = '<strong>' + data.sender_name + ': </strong>' + data.text + '<br/><a href="' + data.thread_url + '" class="text-right">View Message</a>';

            // notify the user
            toastr.success(thread_subject + '<br/>' + message);

            // set unread count
            let url = "{{ route('messages.unread') }}";
          
            $.ajax({
                method: 'GET',
                url: url,
                success: function(data) {
                    console.log('data from fetch: ', data);
                    var div = $('#unread_messages');

                    var count = data.msg_count;
                    if (count == 0) {
                        $(div).addClass('hidden');
                    } else {
                        $(div).text(count).removeClass('hidden');

                        // if on messages.index - add alert class and update latest message
                        $('#thread_list_' + thread_id).addClass('alert-info');
                        $('#thread_list_' + thread_id + '_text').html(thread_plain_text);
                    }
                }
            });
        }
    });

});