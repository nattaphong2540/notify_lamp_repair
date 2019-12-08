<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Products</h4>
                <p class="card-description">
                    show all products in table product
                </p>
                <div class="table-responsive">
                    <table class="table" id="products-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>name</th>
                                <th>price</th>
                                <th>amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($products as $index => $product) { ?>
                                <tr>
                                    <td><?= ++$index ?></td>
                                    <td><?= $product->name ?></td>
                                    <td><?= $product->price ?></td>
                                    <td><?= $product->amount ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#products-table').DataTable();
    });
</script>