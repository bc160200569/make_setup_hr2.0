<div class="modal" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            {{--<!-- Modal Header -->--}}
            <div class="modal-header">
                <h4 class="modal-title">Add Sub Navigation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            {{--<!-- Modal body -->--}}
            <div class="modal-body">
                <form action="{{ route('sub_navigation.store') }}" method="POST">
                    @csrf


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="hidden" name="nav_id" class="form-control" value="{{ $nav_id }}">
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
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
                                <input type="text" name="route" class="form-control" placeholder="Enter URL" required>
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