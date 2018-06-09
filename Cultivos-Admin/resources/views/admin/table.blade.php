 <!-- Dynamic Table Full -->
 <div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">@lang('auth.admin')</h3>
        <div class="block-options">
            <a href="{!! route('admin.create') !!}" >
                <button type="button" class="btn btn-alt-primary js-tooltip-enabled" data-toggle="tooltip" data-placement="top" title="" data-original-title="Top Tooltip">
                    <i class="fa fa-plus mr-5"></i>
                    {{Lang::get('common.new')}}
                </button>
            </a>
        </div>
    </div>
    
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    
                    <th style="width:8%;">@Lang('common.id')</th>
                    <th>@Lang('common.name')</th>
                    <th>@Lang('auth.email')</th>       
                    <th style="width:8%;">@Lang('common.action')</th>       
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{!! $user->id !!}</td>
                        <td>{!! $user->getFullNameAttribute() !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>
                        {!! Form::open(['route' => ['admin.destroy', $user->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-secondary primary-color text-primary',
                                'onclick' => "return confirm('Are you sure?')",'data-toggle'=>"tooltip",  'data-original-title'=>Lang::get('common.delete') ]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- END Dynamic Table Full -->

