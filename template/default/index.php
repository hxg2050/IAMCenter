<?php $this->load('/components/common/header', ['title' => '安米社区-专注于手机网站建设']); ?>

<link rel="stylesheet" href="/static/swiper/css/swiper.min.css">
<script src="/static/swiper/js/swiper.min.js"></script>

<link rel="stylesheet" href="/static/css/novel/style.css?v=0.0.1">


<script src="/static/js/iscroll.js"></script>
<div class="header-height"></div>
<header class="header">
    <span class="logo"></span>
    <div class="flex-box">
      
    <?php if ($message_count > 0) { ?>
            <a href="/user/message" class="new_message_icon"><?=$message_count?></a>
        <?php } ?>
    <a href="/user/index" class="icon-svg user"></a>
    <div class="icon-svg menu left-menu"></div>
    </div>
</header>
<?php $this->load('/components/common/left_menu'); ?>
<div class="index_top_nav index_link">
    <a href="/forum/list?id=1">综合</a>
    <a href="/forum/list?id=2">源码</a>
    <a href="/forum/list?id=3">任务</a>
    <a href="/user/index">个人</a>
    <a href="/user/friend">粉丝</a>
</div>


<div class="column_nav">
    <?php foreach ($column_list['data'] as $item) { ?>
    <a class="column_link" href="/forum/list?id=<?=$item['id']?>">
        <img class="column_photo" src="<?=$item['photo']?>" alt="<?=$item['title']?>">
        <div class="column_info">
            <div class="column_title"><?=$item['title']?></div>
            <div class="column_count">
                总数: <?php $this->load('/components/forum/get_count_by_class_id', ['class_id' => $item['id']]); ?>
            </div>
        </div>
    </a>
    <?php } ?>
</div>


<div class="link_title">更新于：2018-09-14</div>
<div class="m_nav">
    <div class="nav_title"><a href="/forum/view?id=1613">[安米程序] 安米程序V0.3.2(测试版)下载</a></div>
    <div class="nav_memo">
        安米程序[新一代H5手机建站程序]是一款专注于H5手机网站/app建设的一款程序，具有免费开源，上手难度低，程序精简（程序不足1M），功能强大，不懂编程也能轻松定制自己想要的功能。后台强大的组件编写功能，可以像堆积木一样，随意组合出你想要的功能。
    </div>
</div>
<?php $this->load('/components/forum/simple_list', ['list' => $list2]); ?>

<div class="m_body">
    <div class="title-nav"><span class="title-i"></span>最近活跃会员 <a class="user_rank_link" href="/user/rank">Top 排行榜</a></div>
    <?php $this->load('/components/user/new_user_list'); ?>
</div>
<div class="link_title">最新资讯</div>

<?php $this->load('/components/forum/easy_list', ['list' => $list]); ?>

<script>
$(function() {
    var mySwiper = new Swiper ('.swiper-container', {
        autoplay: true,
        pagination: {
            'el': '.swiper-pagination'
        }
    })
});
</script>
<?php $this->load('/components/common/index_link'); ?>
<div class="footer_nav">
  <div>联系我QQ: 243802688</div>
  <div>安米程序 2018新鲜出炉</div>
    <div>本程序免费开源 官网地址 <a class="ianmi_link" href="http://ianmi.com">http://ianmi.com</a></div>
</div>
<?php $this->load('/components/common/footer'); ?>