<table class="table table-striped table-vcenter" id="vegetableTypeCatalogs-table">
    <thead>
        <th>{{Lang::get('common.name')}}</th>
        <th>{{Lang::get('common.description')}}</th>
        <th colspan="3">{{Lang::get('common.action')}}</th>
    </thead>
    <tbody>
    @foreach($vegetableTypeCatalogs as $vegetableTypeCatalog)
        <tr>
            <td>{!! str_limit($vegetableTypeCatalog->Name, 120) !!}</td>
            <td>{!! str_limit($vegetableTypeCatalog->Description, 120) !!}</td>
            <td>
                {!! Form::open(['route' => ['catalogs.vegetableTypeCatalogs.destroy', $vegetableTypeCatalog->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                        <button type="button"  class="btn btn-sm btn-secondary" data-toggle="tooltip" title="" data-original-title="{{Lang::get('common.info')}}">
                                <a href="{!! route('catalogs.vegetableTypeCatalogs.show', [$vegetableTypeCatalog->id]) !!}"><i class="fa fa-eye"></i></a>
                            </button>
                            <button type="button"  class="btn btn-sm btn-secondary" data-toggle="tooltip" title="" data-original-title="{{Lang::get('common.edit')}}">
                                <a href="{!! route('catalogs.vegetableTypeCatalogs.edit', [$vegetableTypeCatalog->id]) !!}"><i class="fa fa-pencil"></i></a>
                            </button>
                    {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-secondary primary-color text-primary',
                        'onclick' => "return confirm('Are you sure?')",'data-toggle'=>"tooltip", 'data-original-title'=>Lang::get('common.delete')]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>