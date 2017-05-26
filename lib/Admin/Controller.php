<?php
/**
 * Created by PhpStorm.
 * User: liumapp
 * Email: liumapp.com@gmail.com
 * homePage: http://www.liumapp.com
 * Date: 5/26/17
 * Time: 10:22 AM
 */

namespace WHMCS\Module\Addon\MultyLoadAnnouncement\Admin;

class Controller
{

    /**
     * @param array $vars Module configuration parameters
     */
    public function index ($vars)
    {

        $isPublished = $vars['isPublished'];

        if ($isPublished == 'on') {
            $isPublished = 1;
        } else {
            $isPublished = 0;
        }


        var_dump($vars);

        return <<< EOT

            

EOT;


    }

}