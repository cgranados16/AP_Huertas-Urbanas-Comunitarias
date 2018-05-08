<table class="table table-striped table-vcenter" id="colorCatalogs-table">
        <thead>
            <tr>
                <th>{{Lang::get('catalogs/color_catalog.color')}}</th>
                <th>{{Lang::get('common.name')}}</th>
                <th>{{Lang::get('common.description')}}</th>
                <th colspan="3">{{Lang::get('common.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($colorCatalogs as $colorCatalog)
            <tr>
                <td style="background-color:{!! ($colorCatalog->ColorHexCode) !!}"></td>
                <td>{!! str_limit($colorCatalog->Name, 120) !!}</td>
                <td>{!! str_limit($colorCatalog->Description, 120) !!}</td>
                <td>
                    {!! Form::open(['route' => ['catalogs.colorCatalogs.destroy', $colorCatalog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-original-title="{{Lang::get('common.info')}}">
                            <a href="{!! route('catalogs.colorCatalogs.show', [$colorCatalog->id]) !!}">
                                <i class="fa fa-eye"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-original-title="{{Lang::get('common.edit')}}">
                            <a href="{!! route('catalogs.colorCatalogs.edit', [$colorCatalog->id]) !!}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </button>
                        {!! Form::button('
                        <i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-secondary primary-color text-primary', 'onclick'
                        => "return confirm('Are you sure?')",'data-toggle'=>"tooltip", 'data-original-title'=>Lang::get('common.delete')
                        ]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>