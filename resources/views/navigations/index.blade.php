<x-app-layout>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <x-breadcrumb title="Navigations" :button="['name' => 'Add', 'allow' => true, 'link' => route('users.create')]" />
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- product profit end -->

                <div class="col-xl-12 col-md-12">
                    <div class="card user-profile-list">
                        <div class="card-body-dd theme-tbl">
                            <x-table :keys="['Title', 'Icon', 'Sub Nav', 'Is Show?', 'Route', 'Status', 'Action']"></x-table>
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
                    },
                    {
                        data: 'url',
                        width: '15%', 
                    },

                ];

                create_datatables(datatable_url, datatable_columns);
            });
        </script>
    @endpush
</x-app-layout>
