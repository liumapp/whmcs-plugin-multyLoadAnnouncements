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

use WHMCS\Database\Capsule;

class Controller
{

    /**
     * @param array $vars Module configuration parameters
     */
    public function index ($vars)
    {

        $isPublished = $vars['isPublished'];

        $modelLink = $vars['modulelink'];

        $postAction = $modelLink  . '&action=' . 'handpost';

        if ($isPublished == 'on') {
            $isPublished = 1;
        } else {
            $isPublished = 0;
        }

        return <<< EOT

<h3>请选择您的csv文件上传</h3>

<form action="{$postAction}" method="post" enctype="multipart/form-data">

    <input type="hidden" name="published" value="{$isPublished}">
    
    <input type="file" name="csv">
    
    <br>
    
    <button type="submit" class="btn btn-success">提交</button>

</form>

EOT;

    }

    public function handpost ()
    {

        if (!isset($_FILES['csv'])) {
            throw new \ErrorException('文件上传有误！');
        }

        $csv = $_FILES['csv'];

        $file = fopen($csv['tmp_name'] , 'r');

        $row = 1;

        while ($data = fgetcsv($file , 10000, ",")) {

            if ($row == 1) {$row++;continue;} //跳过title

            $this->saveData($data);
            $row++;

        }
        fclose($file);

        $row = $row - 1;

        echo '成功保存了' . $row . '条记录';
    }

    /**
     * 保存一行announcement
     * @param array $data
     */
    private function saveData ($data)
    {
        $pdo = Capsule::connection()->getPdo();
        $pdo->beginTransaction();
        try {
            $statement = $pdo->prepare(
                'insert into tblannouncements (date , announcement , title , published , parentid , language) values(:date , :announcement , :title , :published , :parentid , :language)'
            );

            $statement->execute(
                [
                    ':date' => $data[0],
                    ':announcement' => $data[1],
                    ':title' => $data[2],
                    ':published' => addslashes($_POST['published']),
                    ':parentid' => 0,
                    ':language' => '',
                ]
            );
            $pdo->commit();

        } catch (\Exception $e) {

            echo "Uh oh! Inserting didn't work, but I was able to rollback. {$e->getMessage()}";
            $pdo->rollBack();

        }
    }

}


