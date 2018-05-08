<table class="table table-striped table-vcenter" id="vegetablePropertiesCatalogs-table">
    <thead>
        <th>{{Lang::get('common.name')}}</th>
        <th colspan="3">{{Lang::get('common.action')}}</th>
    </thead>
    <tbody>
    @foreach($vegetablePropertiesCatalogs as $vegetablePropertiesCatalog)
        <tr>
            <td>{!! str_limit($vegetablePropertiesCatalog->Name, 120) !!}</td>
            <td>
            {!! Form::open(['route' => ['catalogs.vegetablePropertiesCatalogs.destroy', $vegetablePropertiesCatalog->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                        <button type="button"  class="btn btn-sm btn-secondary" data-toggle="tooltip" title="" data-original-title="{{Lang::get('common.info')}}">
                                <a href="{!! route('catalogs.vegetablePropertiesCatalogs.show', [$vegetablePropertiesCatalog->id]) !!}"><i class="fa fa-eye"></i></a>
                            </button>
                            <button type="button"  class="btn btn-sm btn-secondary" data-toggle="tooltip" title="" data-original-title="{{Lang::get('common.edit')}}">
                                <a href="{!! route('catalogs.vegetablePropertiesCatalogs.edit', [$vegetablePropertiesCatalog->id]) !!}"><i class="fa fa-pencil"></i></a>
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