<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Products Table</h4>
                <p class="card-description">
                    list all products
                </p>
                <div class="table-responsive">
                    <table class="table" id="products-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($products as $index => $product) {
                                echo "<tr>
                                        <td>" . (++$index) . "</td>
                                        <td>{$product->name}</td>
                                        <td>{$product->price}</td>
                                        <td>{$product->amount}</td>
                                    </tr>";
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