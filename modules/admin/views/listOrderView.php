<?php
    get_header('admin');
?>
<div id="main-content-wp" class="list-order-page">
    <div class="wrap clearfix">
        <?php get_sidebar('admin'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail ">
                    <div class="filter-wp clearfix flexSearch">
                        <form method="GET" class="form-s fl-right">
                            <input type="hidden" name="mod" value="admin">
                            <input type="hidden" name="controller" value="order">
                            <input type="hidden" name="action" value="searchStatusOrder">
                            <select name="statusSearch" id="" style="padding: 4px;">
                                <option value="">Trạng thái</option>
                                <option value="0">Chưa xác nhận</option>
                                <option value="1">Đã xác nhận</option>
                                <option value="2">Đã giao</option>
                                <option value="3">Đã hủy</option>
                            </select>
                            <input type="submit" name="sm_s" value="Lọc">
                        </form>
                        <form method="GET" class="form-s fl-right">
                            <input type="hidden" name="mod" value="admin">
                            <input type="hidden" name="controller" value="order">
                            <input type="hidden" name="action" value="searchDateOrder">
                            <input type="date" name="start" value='<?php if(isset($date1)&&!empty($date1)) echo $date1;?>'>
                            <input type="date" name="end" value='<?php if(isset($date2)&&!empty($date2)) echo $date2;?>'>
                            <input type="submit" name="dateSearch" value="Lọc">
                        </form>
                    </div>
                    
                    <div class="table-responsive" style="max-height: 400px; overflow-y: scroll; display: block;">
                        <table class="table list-table-wp" style="width: 100%; border-collapse: collapse;">
                            <thead style="position: sticky; top: 0; background: white; z-index: 1; box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">
                                <tr>
                                    <td style="padding: 10px;"><span class="thead-text">STT</span></td>
                                    <td style="padding: 10px;"><span class="thead-text">Mã đơn hàng</span></td>
                                    <td style="padding: 10px;"><span class="thead-text">Khách hàng</span></td>
                                    <td style="padding: 10px;"><span class="thead-text">Ngày đặt</span></td>
                                    <td style="padding: 10px;"><span class="thead-text">Tổng tiền</span></td>
                                    <td style="padding: 10px;"><span class="thead-text">Trạng thái</span></td>
                                    <td style="padding: 10px;"><span class="thead-text">Thanh toán</span></td>
                                    <td style="padding: 10px;"><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($list)){?>
                                    <?php $i=1;?>
                                    <?php foreach($list as $order){?>
                                <tr>
                                    
                                    <td style="padding: 10px;"><span class="tbody-text"><?php echo $i;?></span></td>
                                    <td style="padding: 10px;"><span class="tbody-text">#<?php echo $order['id'];?></span></td>
                                    <td style="padding: 10px;"><span class="tbody-text"><?php  if(!empty(getCustomerById($order['id'])['fullname'])) echo getCustomerById($order['id'])['fullname'];?></span></td>
                                    <td style="padding: 10px;"><span class="tbody-text"><?php echo $order['create_at'];?></span></td>
                                    <td style="padding: 10px;"><span class="tbody-text"><?php echo currency_format($order['total']);?></span></td>
                                    <td style="padding: 10px;">
                                        <span class="tbody-text">
                                            <?php if($order['status'] == 0) echo '<a href="?mod=admin&controller=order&action=status&status=0&id='.$order['id'].'" style="color: #856404; background: #fff3cd; padding: 5px 10px; border-radius: 15px;">Chưa xác nhận</a>'; 
                                            elseif($order['status'] == 1) echo '<a href="?mod=admin&controller=order&action=status&status=1&id='.$order['id'].'" style="color: #004085; background: #cce5ff; padding: 5px 10px; border-radius: 15px;">Đã xác nhận</a>';
                                            elseif($order['status'] == 2) echo '<a href="?mod=admin&controller=order&action=status&status=2&id='.$order['id'].'" style="color: #155724; background: #d4edda; padding: 5px 10px; border-radius: 15px;">Đã giao </a>';
                                            else echo '<a href="?mod=admin&controller=order&action=status&status=3&id='.$order['id'].'" style="color: #721c24; background: #f8d7da; padding: 5px 10px; border-radius: 15px;">Đã hủy</a>';?>
                                        </span>
                                    </td>
                                    <td style="padding: 10px;">
                                        <span class="tbody-text">
                                            <?php if($order['payment_method'] == 0) echo '<span style="color: #856404; background: #fff3cd; padding: 5px 10px; border-radius: 15px;">Tiền mặt</span>';
                                            else echo '<span style="color: #155724; background: #d4edda; padding: 5px 10px; border-radius: 15px;">Chuyển khoản</span>';?>
                                        </span>
                                    </td>
                                    <td style="padding: 10px;">
                                        <a href="?mod=admin&controller=order&action=detail&id=<?php echo $order['id']?>" class="btn-edit" title="Xem chi tiết"><i class="fa fa-eye"></i></a>
                                        
                                    </td>
                                </tr>
                                <?php $i++;}}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer('admin'); ?>
