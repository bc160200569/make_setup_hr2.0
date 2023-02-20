<x-app-layout>
    <div class="container">
    @include ('sub-navigations.create')
    @include ('sub-navigations.edit')
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
            <x-breadcrumb-modal title="Sub Navigations" :button1="['name' => 'Add', 'allow' => true, 'id'=>'#add']" :button2="['name' => 'Back', 'allow' => true, 'link' => route('navigation.index')]"/>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- product profit end -->

                <div class="col-xl-12 col-md-12">
                    <div class="card user-profile-list">
                        <div class="card-body-dd theme-tbl">
                            <x-table :keys="['Title', 'Is Show?', 'URL', 'Status']"></x-table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('layouts.dataTablesFiles')
    @push('scripts')
    <script>
        var nav_id = "{{$nav_id}}";
        $(document).ready(function() {
            const datatable_url = route('sub_navigation.datatable',nav_id);
            const datatable_columns = [{
                    data: 'name'
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

            ];

            create_datatables(datatable_url, datatable_columns);
        });
    </script>
    @endpush
</x-app-layout>
<!-- <script type="text/javascript">
    function hiden(value) {
        if (value == 1) {
            $('#route').css('display', 'none');
            $('#routes').css('display', 'none');
        } else {
            $('#route').css('display', 'block');
            $('#routes').css('display', 'block');
        }

    }
</script> -->
<script>
    $(document).ready(function() {
        $(document).on('click','#editSub', function(){
            var sub_nav_id = $(this).val();
            console.log(sub_nav_id);
            var url = '{{ route("sub_navigation_edit", ":id") }}';
            url = url.replace(':id', sub_nav_id);
            $('#edit').modal('show');
            $.ajax({
              type: "GET",
            //   url:"sub_navigation_edit/" + sub_nav_id,
              url : url,
              success: function (response){
                console.log(response);
                $('#sub_nav_id').val(sub_nav_id);
                $('#nav_id').val(response.data[0].nav_id);
                $('#nav_name').val(response.data[0].name);
                // $('#nav_icon').val(response.data[0].icon);
                // $('#nav_sub_nav').val(response.data[0].sub_nav);
                $('#nav_is_show').val(response.data[0].is_show);
                // var subnav = response.data[0].sub_nav;
                // if(subnav === 1){
                //     $('#routes').hide();
                // }
                // else{
                //     $('#routes').show();
                // }
                $('#nav_url').val(response.data[0].route);
                $('#nav_status').val(response.data[0].is_active);
              }
            });
        });
    })
</script>