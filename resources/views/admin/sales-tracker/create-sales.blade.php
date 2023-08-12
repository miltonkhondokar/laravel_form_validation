@extends('admin.admin-master')
@section('title', 'Create Sales')
@section('bread', 'Sales')
@section('current_location', 'Create Sales')


@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-danger alert-dismissible" id="alert-show" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                You can again submit this form after 24 hours
            </div>


            <div class="alert alert-danger alert-dismissible" id="alert-message" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                Please fill the required fields
            </div>

            <div class="alert alert-success alert-dismissible" id="success-show" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success</h5>
                Data inserted successfully.
            </div>





            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">New Sales</h3>
                </div>
                <form id="sales_tracker" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="label_for_sales_by">Entry By</label>
                                    <select class="form-control" name="entry_by">
                                        <option value="020123">USER 1</option>
                                        <option value="030123">USER 2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="label_for_buyer_name"><span id="requireds">* </span>Buyer</label>
                                    <input type="text" class="form-control" id="buyer" name="buyer" value=""
                                        placeholder="Enter Buyer Name">
                                </div>
                                <div class="form-group">
                                    <label for="label_for_buyer_phone"><span id="requireds">* </span>Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="phone_prefix">880</span>
                                        </div>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="" placeholder="17xxxxxxxx">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="label_for_buyer_email"><span id="requireds">* </span>Email</label>
                                    <input type="email" class="form-control" id="buyer_email" name="buyer_email"
                                        value="" placeholder="Enter Buyer Email">
                                </div>
                                <div class="form-group">
                                    <label for="label_for_buyer_city">City</label>
                                    <select class="form-control" name="city">
                                        <option value="">- select -</option>
                                        <option value="DHK">Dhaka</option>
                                        <option value="RAJ">Rajshahi</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="label_for_receipt_id"><span id="requireds">* </span>Receipt ID</label>
                                    <input type="text" class="form-control" id="receipt_id" name="receipt_id"
                                        value="" placeholder="Enter Receipt ID">
                                </div>
                                <div class="form-group">
                                    <label for="label_for_buyer_item">Item</label>
                                    <div class="input-group">
                                        <input type="text" id="items" name="items[]" class="form-control">
                                        <span class="input-group-append">
                                            <button type="button" id="addRow" class="btn btn-success btn-flat"><i
                                                    class="fas fa-plus-circle"></i></button>
                                        </span>
                                    </div>
                                    <div id="newRow"></div>
                                </div>




                                <div class="form-group">
                                    <label for="label_for_amount">Amount</label>
                                    <input type="text" class="form-control" id="amount" name="amount"
                                        value="" placeholder="Amount">
                                </div>
                                <div class="form-group">
                                    <label for="label_for_note">Note</label>
                                    <textarea class="form-control" rows="2" id="note" name="note" placeholder="Note . . ."></textarea>
                                </div>
                            </div>
                        </div>




                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
