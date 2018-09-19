<?php
namespace App;

use Iam\Db;
use Iam\Url;
use Iam\View;
use Iam\Session;
use Model\Category;

class CommonPublic
{
    public $user = ['id' => 0];
    public $upExp = 25;

    private $version;

    public function __construct()
    {
        $this->version = IamVersion::$version;
        if (Session::has('sid')) {
            $this->user = Db::table('user')->find('sid', Session::get('sid'));
            $level_info = getUserLeve($this->user['exp'], $this->upExp);
            $this->user = array_merge($this->user, $level_info);
        } else {
        }
        View::data([
            'user' => $this->user,
            'version' => $this->version
        ]);
    }

    protected function isLogin()
    {
      if (!$this->user['id']) {
        Url::redirect('/Login/index');
        exit();
      }
      return true;
    }

    protected function getNickname($userid)
    {
        // print_r($userid);
        // print_r(Db::table('user')->field('nickname')->find(2));
        return Db::table('user')->field('nickname')->find($userid)['nickname'];
    }

    protected function getUserInfo($field, $userid)
    {
        // print_r($userid);
        // print_r(Db::table('user')->field('nickname')->find(2));
        return Db::table('user')->field($field)->find($userid);
    }

    protected function isAdmin($user_id, $class_id)
    {
        if ($user_id == 1) {
            return true;
        }
        $class = Category::$class_id;
        $admin_id = explode(',', $class['bm_id']);
        if (in_array($user_id, $admin_id)) {
            return true;
        }
    }
}
