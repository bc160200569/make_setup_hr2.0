<div class="modal" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            {{--<!-- Modal Header -->--}}
            <div class="modal-header">
                <h4 class="modal-title">Edit Permission</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            {{--<!-- Modal body -->--}}
            <div class="modal-body">
                <form action="{{ route('permission_update') }}" method="POST">
                    @csrf


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="hidden" name="id" id="id" class="form-control">
                                <input type="text" name="name" id="nav_name" class="form-control" placeholder="Enter Name" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Is Show?:</strong>
                                <select name="is_show" id="nav_is_show" class="form-control">
                                    <option value="1" selected="selected">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 routes" id="routes">
                            <div class="form-group">
                                <strong>URL:</strong>
                                <input type="text" name="route" id="nav_url" class="form-control" placeholder="Enter URL">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Status:</strong>
                                <select name="status" id="nav_status" class="form-control">
                                    <option value="1" selected="selected">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
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