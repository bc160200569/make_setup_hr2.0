<div class="modal" id="add_navigation">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {{--<!-- Modal Header -->--}}
            <div class="modal-header">
                <h4 class="modal-title">Add Navigation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            {{--<!-- Modal body -->--}}
            <div class="modal-body">
                <form action="{{ route('navigation_store') }}" method="POST">
                    @csrf


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Navigation Name" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Icon:</strong>
                                <input type="text" name="icon" class="form-control" placeholder="Navigation Icon">
                                {{--<select name="icon" id="icon" class="form-control">
                    <option value="">Select Icon</option>
                    <option value="fa fa-list">List<i class="fa fa-list"></i></option>
                    <option value="fa fa-list">&#xf0f3;</option>
                    <!-- <option value="0" selected="selected">No</option> -->
                </select>--}}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sub Navigation:</strong>
                                <select name="sub_nav" id="sub_nav" class="form-control" onchange="hiden(value)">
                                    <option value="1">Yes</option>
                                    <option value="0" selected="selected">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Is Show?:</strong>
                                <select name="is_show" id="is_show" class="form-control">
                                    <option value="1" selected="selected">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" id="route">
                            <div class="form-group">
                                <strong>URL:</strong>
                                <input type="text" name="route" class="form-control" placeholder="Enter URL">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Status:</strong>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" selected="selected">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        {{--<!-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
        </div> -->--}}
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-danger" id="edit_form" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

            {{--<!-- Modal footer -->--}}
            {{--<!-- <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div> -->--}}

        </div>
    </div>
</div>