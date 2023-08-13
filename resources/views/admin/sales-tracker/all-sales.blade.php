@extends('admin.admin-master')
@section('title', 'Sales')
@section('bread', 'Home')
@section('current_location', 'All Sales')



@section('content')


    <div class = "row">
    <div class = "col-md-12">
    <div class = "card card-danger">
    <div class = "card-header">
    <h3  class = "card-title">Filter Data</h3>
                </div>
                <div class = "card-body">


                    <div class = "row">
                    <div class = "col-4">
                    <div class = "form-group">
                                <label>From Date: </label>
                                <div   class = "input-group">
                                <input type  = "text" class = "form-control" id = "from_date" />
                                </div>
                            </div>
                        </div>
                        <div class = "col-4">
                        <div class = "form-group">
                                <label>To Date: </label>
                                <div   class = "input-group">
                                <input type  = "text" class = "form-control" id = "to_date" />
                                </div>
                            </div>
                        </div>
                        <div class = "col-4">
                        <div class = "form-group">
                                <label>User</label>
                                <select class = "form-control" name = "entry_by" id = "entry_by">
                                <option value = "">- select -</option>
                                <option value = "020123">USER 1</option>
                                <option value = "030123">USER 2</option>
                                </select>
                            </div>
                        </div>
                    </div>





                </div>
                <div    class = "card-footer">
                <button type  = "submit" class = "btn btn-danger float-right" id     = "sales-filter-btn">Filter</button>
                <button type  = "submit" class = "btn btn-default float-right" style = "margin-right: 20px;"
                        id    = "filter-reset-btn">Reset</button>
                </div>

            </div>

        </div>



    </div>




    <div class = "row">
    <div class = "col-12">
    <div class = "card">
    <div class = "card-header">
    <h3  class = "card-title">Sales Info</h3>
                </div>
                <div   class = "card-body">
                <table id    = "tbl-all-sale-records" class = "table table-bordered table-hover">
                <thead class = "table-danger">
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

                        </tbody>
                        <tfoot class = "table-danger">
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
