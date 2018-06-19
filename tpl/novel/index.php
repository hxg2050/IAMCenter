<?php self::load('Common/header',['title' => '安米小说']); ?>
<div class="header">
    <span class="logo"></span>
    <?php if (empty($user['id'] > 0)){ ?>
        <a href="/Login/index" class="right-nav">登陆/注册</a>
    <?php } else { ?>
        <a href="/User/index" class="right-nav"><?=$user['username']?></a>
    <?php } ?>
</div>
    <form class="index-search" action="/Novel/search" method="get">
        <div><input type="text" name="word" value="" placeholder="输入您要搜索的关键词！"></div>
        <div><button name="action" value="0">搜全部</button> <button name="action" value="1">搜书名</button> <button name="action" value="2">搜作者</button> <button name="action" value="3">搜标签</button></div>
    </form>
	<div class="title-nav"><span class="title-i"></span><a href="/Novel/list">小说系统</a></div>
    <div class="mark-title">
        <?php foreach ($mark as $item) { ?>
            <a href="/Novel/list?id=<?=$item['id']?>"><?=$item['title']?></a>
        <?php } ?>
    </div>
    <div class="title-nav"><span class="title-i"></span>最新</div>
    <div>

    <?php foreach ($new_list as $item) { ?>
        <a class="novel-list" href="/Novel/view?id=<?=$item['id']?>">
            <div class="novel-photo" style="background-image:url(<?=$item['photo']?>);"></div>
            <div class="novel-info">
                <div class="novel-title"><?=$item['title']?> - <?=$item['author']?></div>
                <div>标签：<?php foreach ($item['mark'] as $mark) { ?><?=$mark['title']?> <?php } ?></div>
                <div class="novel-memo">简介：<?=$item['memo']?></div>
            </div>
        </a>
    <?php } ?>
    </div>
    <div class="footer">IANMI 安米小说系统</div>
<?php self::load('Common/footer',['title' => '网页标题']); ?>