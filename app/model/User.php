<?php
namespace Model;

use Iam\Page;
use think\Db;
use think\Model;

class User extends Model
{
    public function getIsOnlineAttr($value, $data)
    {
        $diff = time() - strtotime($data['last_time']);
        return $diff < 20 * 60;
    }

    public function getLvAttr($value, $data)
    {
        $level = getUserLevel($data['exp'], 25);
        return $level;
    }

    private static $options = [
        'var_page' => 'page',
        'pagesize' => 10
    ];
    // array (
    //     'page' => 1,
    //     'pagesize' => 10,
    //     'order' => 0,0 动态排序，1 最新，2 阅读量 3 回复量
    //     'sort' => 0,0 正序 1 倒序
    //   )

    private static $order = ['last_time', 'id', 'exp', 'coin'];
    private static $sort = ['ASC', 'DESC'];

    private static $search = [];

    public static function getList($options = []/*$class_id = 0, $page = 1, $pagesize = 10, word*/)
    {
        $options = array_merge(self::$options, $options);
        $user = self::where('lock_time', '<', now());

        $order_value = $options['order'];

        if (isset(self::$order[$order_value])) {
            $sort_value = $options['sort'];
            if (isset(self::$sort[$sort_value])) {
                $user->order(self::$order[$order_value], self::$sort[$sort_value]);
            } else {
                $user->order(self::$order[$order_value]);
            }
        }
        return $user->paginate($options['pagesize'], false, [
            'var_page' => $options['var_page']
        ]);
    }

    public static function changeCoin($user_id, $coin)
    {
        $sql = 'UPDATE `user` SET `coin`=`coin`+? WHERE `id`=?';
        Db::query($sql, [$coin, $user_id]);
    }

    /**
     * 用户排行榜
     * @param int $tp 0经验榜 1金币榜
     */
    public static function rank($tp = 0)
    {
        $user = self::where('lock_time', '<', now());
        if ($tp == 1) {
            $user->order('coin', 'DESC');
        } else {
            $user->order('exp', 'DESC');
        }
        return $user->limit(20)->select()->toArray();
    }
}
