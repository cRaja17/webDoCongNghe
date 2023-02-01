<?php foreach($data['products'] as $key => $product) : ?>
<form>
    <tr>
        <td><a href="" data-toggle="modal" id="order" data-target="#product_detail_<?=$product['product_id']?>" value=""
                data-toggle="tooltip" data-placement="right"
                title="Xem chi tiết"><?php echo ($product['product_name']) ?></a></td>
        <td><?php echo Unit::format_VND($product['price']) ?></td>
        <td><img src="<?php echo asset('storage/thumbnail/'.$product['thumbnail']) ?>" width=80px></td>
        <td><?php echo ($product['amount']) ?></td>
        <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item"
                        href="<?php echo url('admin/product/edit/'.$product['product_id']) ?>">Sửa</a>
                    <button class="dropdown-item drop_product" value="<?=$product['product_id']?>" href="">Xóa</button>
                </div>
            </div>
        </td>
    </tr>
    <!-- model  -->
    <div class="modal fade bd-example-modal-lg" id="product_detail_<?=$product['product_id']?>" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span><?=$product['product_name']?></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item">Danh mục : <span><?=$product['category_name']?></span> </li>
                        <li class="list-group-item">Thương hiệu : <span><?=$product['brand']?></span> </li>
                        <li class="list-group-item">Giá tiền : <span><?=Unit::format_VND($product['price'])?></span> </li>
                        <li class="list-group-item">Số lượng : <span><?=$product['amount']?></span> </li>
                        <li class="list-group-item">Hình ảnh<img
                                src="<?=asset('storage/thumbnail/'.$product['thumbnail'])?>" width=100px /></li>

                        <?php
                        preg_match_all('@src="([^"]+)"@', $product['images'] , $match_img);
                        $srcImg = array_pop($match_img);
                        // print_r($srcImg);
                        foreach($srcImg as $key => $image) : ?>
                        <li class="list-group-item">Hình ảnh chi tiết (<?=$key+1?>)<img src="<?=$image?>?>" width=100px /></li>
                        <?php endforeach; ?>
                        
                        <li class="list-group-item" width=100%>Giới thiệu :<?=$product['description']?></li>
                    </ul>
                    <!-- end model -->

                </div>
            </div>
        </div>
    </div>
    <!-- end model  -->
</form>

<?php endforeach; ?>
