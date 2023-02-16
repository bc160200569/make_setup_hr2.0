<x-app-layout>
    <div class="container">
        <div class="modal" id="add_navigation">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    @php
                    $title = "Add Navigation";
                    @endphp
                    @section('title')
                    {{ $title }}
                    @endsection
                    {{--<!-- Modal Header -->--}}
                    <div class="modal-header">
                        <h4 class="modal-title">{{ $title }}</h4>
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
        <div class="modal" id="edit_navigation">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    @php
                    $title = "Edit Navigation";
                    @endphp
                    @section('title')
                    {{ $title }}
                    @endsection
                    {{--<!-- Modal Header -->--}}
                    <div class="modal-header">
                        <h4 class="modal-title">{{ $title }}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    {{--<!-- Modal body -->--}}
                    <div class="modal-body">
                        <form action="{{ route('navigation_update') }}" method="POST">
                            @csrf


                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="hidden" name="id" id="nav_id" class="form-control">
                                        <input type="text" name="name" id="nav_name" class="form-control" placeholder="Navigation Name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Icon:</strong>
                                        <input type="text" name="icon" id="nav_icon" class="form-control" placeholder="Navigation Icon">
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
                                        <select name="sub_nav" id="nav_sub_nav" class="form-control" onchange="hiden(value)">
                                            <option value="1">Yes</option>
                                            <option value="0" selected="selected">No</option>
                                        </select>
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
    </div>
    <div class="pcoded-main-container">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <x-breadcrumb title="Navigations" :button="['name' => 'Add', 'allow' => true, 'id'=>'#add_navigation']" />
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- product profit end -->

                <div class="col-xl-12 col-md-12">
                    <div class="card user-profile-list">
                        <div class="card-body-dd theme-tbl">
                            <x-table :keys="['Title', 'Icon', 'Sub Nav', 'Is Show?', 'URL', 'Status', 'Action']"></x-table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('layouts.dataTablesFiles')
    @push('scripts')
    <script>
        $(document).ready(function() {
            const datatable_url = route('navigation_index.datatable');
            const datatable_columns = [{
                    data: 'name'
                },
                {
                    data: 'icon'
                },
                {
                    data: 'sub_nav'
                },
                {
                    data: 'is_show'
                },
                {
                    data: 'route'
                },
                {
                    data: 'action',
                    width: '15%',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'sub_navigation',
                    orderable: false,
                    searchable: false
                },

            ];

            create_datatables(datatable_url, datatable_columns);
        });
    </script>
    @endpush
</x-app-layout>
<script type="text/javascript">
    function hiden(value) {
        if (value == 1) {
            $('#route').css('display', 'none');
            $('#routes').css('display', 'none');
        } else {
            $('#route').css('display', 'block');
            $('#routes').css('display', 'block');
        }

    }
    // function hiden(value) {
    //     var abc = $("#nav_sub_nav").val();
    //     var xyz = $("#sub_nav").val();
    //     // alert(abc); return false;
    //     if (abc == 1 || xyz == 1) {
    //         $('#route').css('display', 'none');
    //         $('#routes').css('display', 'none');
    //     } else {
    //         $('#route').css('display', 'block');
    //         $('#routes').css('display', 'block');
    //     }

    // }
</script>
<script>
    $(document).ready(function() {
        $(document).on('click','#editNavigation', function(){
            var nav_id = $(this).val();
            // alert(nav_id);
            // console.log(nav_id);
            $('#edit_navigation').modal('show');
            $.ajax({
              type: "GET",
              url:"navigation_edit/" + nav_id,
              success: function (response){
                // console.log(response.navigation[0].icon);
                // console.log(nav_id);
                $('#nav_id').val(nav_id);
                $('#nav_name').val(response.navigation[0].name);
                $('#nav_icon').val(response.navigation[0].icon);
                $('#nav_sub_nav').val(response.navigation[0].sub_nav);
                $('#nav_is_show').val(response.navigation[0].is_show);
                var subnav = response.navigation[0].sub_nav;
                if(subnav === 1){
                    $('#routes').hide();
                }
                else{
                    $('#routes').show();
                }
                $('#nav_url').val(response.navigation[0].route);
                $('#nav_status').val(response.navigation[0].is_active);
              }
            });
        });
        // $(document).on('click','#edit_form', function(){
        //     // var nav_id = $(this).val();
        //     // console.log(nav_id);
        //     $('#editProduct').modal('ata-bs-dismiss');
        // });
    })
    // $(document).ready(function() {
    //     $(document).on('click','#edit_form', function(){
    //         // var nav_id = $(this).val();
    //         // console.log(nav_id);
    //         $('#edit_Product').modal('destroy');
    //     });
    //   })
</script>