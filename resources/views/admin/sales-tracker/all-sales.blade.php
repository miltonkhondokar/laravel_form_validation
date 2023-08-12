@extends('admin.admin-master')
@section('title', 'Sales')
@section('bread', 'Home')
@section('current_location', 'All Sales')



@section('content')

{{--
    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Filter Data</h3>
                </div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>From Date: </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="from_date" />
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>To Date: </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="to_date" />
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>User</label>
                                <select class="form-control" name="entry_by" id="entry_by">
                                    <option value="">- select -</option>
                                    <option value="020123">USER 1</option>
                                    <option value="030123">USER 2</option>
                                </select>
                            </div>
                        </div>
                    </div>





                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger float-right" id="sales-filter-btn">Filter</button>
                    <button type="submit" class="btn btn-default float-right" style="margin-right: 20px;"
                        id="filter-reset-btn">Reset</button>
                </div>

            </div>

        </div>



    </div>


--}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sales Info</h3>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="table-danger">
                            <tr>
                                <th>#SL</th>
                                <th>Buyer</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Receipt ID</th>
                                <th>Item(s)</th>
                                <th>Amount</th>
                                <th>Entry At</th>
                                <th>Entry By</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if(isset($data) && is_countable($data) && !empty($data) && count($data) > 0){
                        $i = 1;
                        foreach ($data as $key => $value) {
                        ?>
                            <tr class="<?php if ($key % 2 == 0) {
                                echo 'table-warning';
                            } else {
                                echo 'table-info';
                            } ?>">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['buyer']; ?></td>
                                <td><?php echo $value['phone']; ?></td>
                                <td><?php echo $value['buyer_email']; ?></td>
                                <td><?php echo $value['city']; ?></td>
                                <td><?php echo $value['receipt_id']; ?></td>
                                <td><?php echo $value['items']; ?></td>
                                <td><?php echo $value['amount']; ?></td>
                                <td><?php echo $value['entry_at']; ?></td>
                                <td><?php echo $value['entry_by']; ?></td>
                            </tr>
                            <?php $i++;
                        } }else{ ?>
                            <tr>
                                <td colspan="10" class="text-center">No Data Found</td>
                            </tr>
                            <?php }?>
                        </tbody>
                        <tfoot class="table-danger">
                            <tr>
                                <th>#SL</th>
                                <th>Buyer</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Receipt ID</th>
                                <th>Item(s)</th>
                                <th>Amount</th>
                                <th>Entry At</th>
                                <th>Entry By</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
