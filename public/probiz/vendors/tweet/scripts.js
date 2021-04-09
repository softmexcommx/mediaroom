jQuery(function($){
    var FEED = window.FEED||{};
    
    FEED.TWEET= function(){
        $('.tw_username').twittie({
            count: 1,
            template: '{{user_name}}'
        });
        $('.tweets_row').twittie({
            dateFormat: '%d %b, %Y',
            count: 2,
            template:
                '{{tweet}}'+'<br>'
                +'<span><i class="social_twitter"></i>{{date}}</span>'
        });
    }
    
    $(document).ready(function(){FEED.TWEET();})
})