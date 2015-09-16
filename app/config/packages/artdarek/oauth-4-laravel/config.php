<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	'storage' => 'Session', 

	'consumers' => array(

        'Google' => array(
            'client_id'     => 'Your Google client ID',
            'client_secret' => 'Your Google Client Secret',
            'scope'         => array('userinfo_email', 'userinfo_profile'),
        ),

	)

);