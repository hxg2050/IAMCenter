<?php $this->load('/components/common/user_header', ['title' => $view['info']['title'] . '-帖子修改']); ?>
<?php $this->load('/components/common/header_nav', ['back_url' => '/forum/view?id=' . $view['info']['id'], 'title' => $view['info']['title']]); ?>

<form id="add" class="box-padding" action="/forum/ajax_edit/?id=<?=$view['info']['id']?>" method="post">
    <input type="hidden" name="img_data" value="<?=$view['info']['img_data']?>">
    <input type="hidden" name="file_data" value="<?=$view['info']['file_data']?>">
    <div class="item-line item-lg">
        <div class="item-title">标题</div>
        <div class="item-input"><input type="text" value="<?=$view['info']['title']?>" class="input input-line input-lg" name="title" placeholder="标题"></div>
    </div>
    <div class="item-line item-lg">
        <div class="item-title">内容</div>
        <div class="item-input">
            <textarea name="context" class="add_context input input-line input-lg" placeholder="内容"><?=$view['info']['context']?></textarea>
        </div>
    </div>
    <div class="file_box">
        <div class="tab">
            <div class="tab-header">
                <div class="tab-link tab-active" data-to-tab=".tab1">图片</div>
                <div class="tab-link" data-to-tab=".tab2">文件</div>
            </div>
            <div class="tab-content">
                <div class="tab-page tab1 tab-active">
                    <div class="file_group">
                        <?php foreach ($view['info']['img_list'] as $item) { ?>
                        <div class='img_item' data-id="<?=$item['id']?>" style="background-image: url(<?=$item['path']?>)">
                            <div style="font-size: .6rem;" class="progress_text btn_pic_insert">插入</div>
                            <div class="progress_del">x</div>
                        </div>
                        <?php } ?>
                        <div class="add_btn add_img">
                            添加<br>图片
                        </div>
                    </div>
                </div>
                <div class="tab-page tab2">
                    <div class="file_group">
                        <?php foreach ($view['info']['file_list'] as $item) { ?>
                        <div class="file_item" data-id="<?=$item['id']?>">
                            <div class="file_icon icon-svg"></div>
                            <div class="file_progress_box">
                                <div class="file_name"><?=$item['name']?>(<?=$item['format_size']?>)</div>
                                <div class="file_progress">
                                    <div class="file_progress_bar" style="width: 100%"></div>
                                </div>
                            </div>
                            <div class="file_action">
                                <div class="flex-box">
                                    <div class="btn_remove btn_file_remove">删除</div>
                                    <div class="btn_setting">--</div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="add_btn add_file">
                            添加<br>文件
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p><button class="btn btn-fill btn-lg btn-block">保存修改</button></p>
</form>
<script src="/static/js/forum/add_upload.js?v=0.0.1"></script>
<?php $this->load('/components/common/footer'); ?>