<div class="dt-responsive table-responsive">
    <table id="user-list-table" class="table nowrap datatable">
        <thead>
            <tr>
                @forelse ($keys as $key)
                    <th>{{ $key}}</th>    
                @empty
                    
                @endforelse
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>