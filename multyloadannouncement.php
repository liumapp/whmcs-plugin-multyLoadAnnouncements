<?php
/**
 * Created by PhpStorm.
 * User: liumapp
 * Email: liumapp.com@gmail.com
 * homePage: http://www.liumapp.com
 * Date: 5/25/17
 * Time: 5:39 PM
 */

function addonmodule_config()
{
    return array(
        'name' => 'Multy Load Announcement', // Display name for your module
        'description' => 'A whmcs addon module , which significance is load multy announcements.',
        'author' => 'liumapp', // Module author name
        'language' => 'english', // Default language
        'version' => '1.0', // Version number
        'fields' => array(
            'isPublished' => array(
                'FriendlyName' => '是否立即发布',
                'Type' => 'radio',
                'Options' => '不发布,发布',

            ),
        )
    );
}

