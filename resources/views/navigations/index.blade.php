<x-app-layout>
    @php
    $title = "Navigations";
    @endphp
    @section('title')
    {{ $title }}
    @endsection
    <div class="container">
    @include ('navigations.create')
    @include ('navigations.edit')
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
            <x-breadcrumb title="{{ $title }}" :button="['name' => 'Add', 'allow' => true, 'id'=>'#add_navigation']" />
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
            const datatable_url = route('navigation.datatable');
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
</script>
<script>
    $(document).ready(function() {
        $(document).on('click','#editNavigation', function(){
            var nav_id = $(this).val();
            $('#edit_navigation').modal('show');
            $.ajax({
              type: "GET",
              url:"navigation_edit/" + nav_id,
              success: function (response){
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
    })
</script>