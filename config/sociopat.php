<?php

return [
    "facebook" =>
        [
        'post_page_id' => env('FACEBOOK_POST_PAGE_ID'),
        'post_token' => env('FACEBOOK_POST_TOKEN'),
        'page_token' => env('FACEBOOK_POST_TOKEN'),

        ],
    "vkontakte" =>
        [
          'post_user_id' => env('VKONTAKTE_POST_USER_ID'),
          'post_group_id' => env('VKONTAKTE_POST_GROUP_ID'),
          'post_token' => env('VKONTAKTE_POST_TOKEN'),
        ],
    "mailru" =>
        [
            'post_user_id' => env('MAILRU_POST_USER_ID'),
            'post_group_id' => env('MAILRU_POST_GROUP_ID'),
            'post_token' => env('MAILRU_POST_TOKEN'),
        ],
    "odnoklassniki" => [

        'post_token' => env('ODNOKLASSNIKI_POST_TOKEN'),
        'public_key' => env('ODNOKLASSNIKI_PUBLIC_KEY'),
    ],
    "twitter" => [
        'post_user_id' => env('TWITTER_POST_USER_ID'),
        'post_group_id' => env('TWITTER_POST_GROUP_ID'),
        'post_token' => env('TWITTER_POST_TOKEN'),
    ],
];