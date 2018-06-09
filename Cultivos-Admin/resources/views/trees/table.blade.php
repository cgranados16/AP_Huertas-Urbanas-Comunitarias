 <!-- Dynamic Table Full -->
 <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">@lang(trans_choice('vegetables.vegetables',10))</h3>
            <div class="block-options">
                <a href="{!! route('vegetables.create') !!}" >
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
                <th>{{Lang::get('common.name')}}</th>
                <th>{{Lang::get('trees.order')}}</th>
                <th>{{Lang::get('trees.indanger')}}</th>
                <th>{{Lang::get('/common.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trees as $tree)
            <tr>
                    <td>{!! str_limit($tree->Name, 120) !!}</td>
                    <td>{!! str_limit($tree->Order, 120) !!}</td>
                    <td>{!! str_limit($tree->InDanger, 120) !!}</td>
                     <td>
                        {!! Form::open(['route' => ['trees.destroy', $tree->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <button type="button"  class="btn btn-sm btn-secondary" data-toggle="tooltip" title="" data-original-title="{{Lang::get('common.info')}}">
                                        <a href="{!! route('trees.edit', [$tree->id]) !!}"><i class="fa fa-eye"></i></a>
                                    </button>
                                    <button type="button"  class="btn btn-sm btn-secondary" data-toggle="tooltip" title="" data-original-title="{{Lang::get('common.edit')}}">
                                        <a href="{!! route('trees.edit', [$tree->id]) !!}"><i class="fa fa-pencil"></i></a>
                                    </button>
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
