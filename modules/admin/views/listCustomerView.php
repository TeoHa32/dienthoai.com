<?php
    get_header('admin');
?>
<div id="main-content-wp" class="list-customer-page">
    <div class="wrap clearfix">
        <?php get_sidebar('admin'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <form method="GET" class="form-s fl-right">
                            <input type="hidden" name="mod" value="admin">
                            <input type="hidden" name="controller" value="customer">
                            <input type="hidden" name="action" value="searchCustomer">
                            <input type="text" name="s" id="s" placeholder="Nhập tên khách hàng ...">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="table-responsive" style="max-height: 400px; overflow-y: scroll; display: block;">
                        <table class="table list-table-wp" style="width: 100%; border-collapse: collapse;">
                            <thead style="position: sticky; top: 0; background: white; z-index: 1; box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">
                                <tr>
                                    <td style="padding: 10px;"><span class="thead-text">STT</span></td>
                                    <td style="padding: 10px;"><span class="thead-text">Họ và tên</span></td>
                                    <td style="padding: 10px;"><span class="thead-text">Email</span></td>
                                    <td style="padding: 10px;"><span class="thead-text">Số điện thoại</span></td>
                                    <td style="padding: 10px;"><span class="thead-text">Địa chỉ</span></td>
                                    <td style="padding: 10px;"><span class="thead-text">Trạng thái</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($list)){?>
                                    <?php $i=1;?>
                                    <?php foreach ($list as $cus) {?>

                                <tr>
                                    <td style="padding: 10px;"><span class="tbody-text"><?php echo $i;?></span></td>
                                    <td style="padding: 10px;"><span class="tbody-text"><?php echo $cus['fullname'];?></span></td>
                                    <td style="padding: 10px;"><span class="tbody-text"><?php echo $cus['email'];?></span></td>
                                    <td style="padding: 10px;"><span class="tbody-text"><?php echo $cus['phone'];?></span></td>
                                    <td style="padding: 10px;"><span class="tbody-text"><?php echo $cus['address'];?></span></td>
                                    <td style="padding: 10px;"><span class="tbody-text"><?php if($cus['status']==0) echo '<a href="?mod=admin&controller=customer&action=status&status=0&id='.$cus['id'].'" style="color: green;">Hoạt động</a>'; else echo '<a href="?mod=admin&controller=customer&action=status&status=1&id='.$cus['id'].'" style="color: red;">Đã khóa</a>'?></span></td>
                                    
                                </tr>
                                <?php $i++; }}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer('admin'); ?>

