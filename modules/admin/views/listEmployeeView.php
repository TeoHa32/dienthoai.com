<?php
    get_header('admin');
?>
<div id="main-content-wp" class="list-employee-page">
    <div class="wrap clearfix">
        <?php get_sidebar('admin'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách nhân viên</h3>
                    <a href="?mod=admin&controller=employee&action=redirectaddEmployee" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($listEmployee)):?>
                                <?php $i=1; ?>
                                <?php foreach($listEmployee as $employee):?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $i?></span></td>
                                    <td><span class="tbody-text"><?php echo $employee['fullname']?></span></td>
                                    <td><span class="tbody-text"><?php echo $employee['email']?></span></td>
                                    <td><span class="tbody-text"><?php echo $employee['phone']?></span></td>
                                    <td>
                                        <a href="?mod=admin&controller=employee&action=redirectEditEmployee&id=<?php echo $employee['id']?>" class="btn-edit" title="Sửa"><i class="fa fa-pencil"></i></a>
                                        <a href="?mod=admin&controller=employee&action=deleteEmployee&id=<?php echo $employee['id']?>" class="btn-delete" title="Xóa"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    
                    <ul id="list-paging" class="fl-right">
                        <?php if($page>1){?>
                        <li>
                            <a href="<?php echo '?mod=admin&controller=employee&action=pagination&page='.$page-1; ?>" title=""><</a>
                        </li>
                        <?php }?>
                        <?php for($i=1;$i<=$num_page;$i++){ ?>
                        <li>
                            <a href="?mod=admin&controller=employee&action=pagination&page=<?php echo $i?>" title="" ><span <?php if($page==$i){echo 'class="active"';}?>><?php echo $i?></span></a>
                        </li>
                        <?php }?>
                        <?php if($page<$num_page){?>
                        <li>
                            <a href="<?php echo '?mod=admin&controller=employee&action=pagination&page='.$page+1; ?>" title="">></a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer('admin'); ?>