<?php foreach ($data['discounts'] as $key => $discount) : ?>
<tr>
    <td><?= $discount['name'] ?></td>
    <td><?= Unit::format_VND($discount['price']) ?></td>
    <?php if ($discount['date_discount'] > date("Y-m-d h:i:s")) : ?>
    <td><?=Unit::format_VND(Unit::total($discount))?></td>
    <?php else: ?>
    <td style = "color : red">Hết hạn </td>
    <?php endif; ?>
    <td><?= $discount['discount']?>%</td>
    <td><?= $discount['date_discount'] ?></td>
    <td class="text-right">
        <div class="dropdown">
            <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#edit">Sửa</a>
                <a class="dropdown-item delete_discount" href="" data-id='<?=$discount['dis_id']?>' >Xóa</a>
            </div>
        </div>
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editDis"
                                aria-hidden="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editDis">Sửa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="false">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Sản phẩm :</label>
                                                <select class="custom-select edit_product_id" name="product_id">
                                                    <?php foreach ($data['products'] as $product) : ?>
                                                    <option value="<?=$product['id']?>" <?php if($product['id'] == $discount['product_id']) { echo 'selected' ;} ?> ><?=$product['name']?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Khuyến mãi:</label>
                                                <input type="input" class="form-control edit_discount1"
                                                    id="recipient-name" value="<?=$discount['discount']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Ngày hết hạn:</label>
                                                <input type="datetime-local" class="form-control edit_date_discount"
                                                    id="recipient-name" value="<?=$discount['date_discount']?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" data-dismiss="modal"
                                                    class="btn btn-primary edit_discount" data-id='<?=$discount['dis_id']?>' >Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </td>
</tr>
<?php endforeach ; ?>