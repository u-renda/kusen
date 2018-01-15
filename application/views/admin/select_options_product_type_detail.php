<select id="id_product_type_detail" name="id_product_type_detail" class="form-control">
    <option value="">-- Pilih Produk Detail --</option>
    <?php
    foreach ($product_type_detail_lists as $key => $value)
    {
        echo '<option id="'.$value->id_product_type_detail.'" value="'.$value->id_product_type_detail.'"'.set_select('id_product_type_detail', $value->id_product_type_detail).'>'.ucwords($value->name).'</option>';
    }
    ?>
</select>